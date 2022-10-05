<?php

namespace App\Services;

use App\Jobs\ChargeInvoiceJob;
use App\Models\Invoice;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class InvoiceService
{
    public static function createDailyInvoiceFromUsers() {
        $users = User::query()
            ->chargeable()
            ->get();


        $invoices = [];
        foreach($users as $user) {
            $invoices[] = [
                'uuid' => Str::uuid()->toString(),
                'user_id' => $user->id,
                'price' => 500,
                'status' => false,
                'tariff' => 500,
                'phone' => $user->phone
            ];
        }

        Invoice::insert($invoices);
    }

    public static function charge(Invoice $invoice) {
        $invoice->update([
            'attempt' => $invoice->attempt + 1,
            'last_attempt' => Carbon::now(),
        ]);

        // CODE FOR RANDOMLY ERROR GENERATING
        if(rand(0, 13) === 13) {
            throw new \Exception('Random Error, for testing purpose, try to rerun queues');
        }

        $invoice->update([
            'charged_at' => Carbon::now(),
            'status' => true,
        ]);
    }

    public static function chargeDailyInvoices () {
        $unchargedInvoices = Invoice::query()
            ->where('status', false)
            ->get();

        foreach($unchargedInvoices as $invoice) {
            ChargeInvoiceJob::dispatch($invoice);
        }
    }
}
