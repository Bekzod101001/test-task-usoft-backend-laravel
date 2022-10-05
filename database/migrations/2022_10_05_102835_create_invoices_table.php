<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedDouble('price', 15, 2);
            $table->string('phone');
            $table->string('tariff')->nullable();
            $table->integer('status')->nullable();
            $table->integer('attempt')->default(0);
            $table->timestamp('date')->nullable();
            $table->timestamp('last_attempt')->nullable();
            $table->timestamp('charged_at')->nullable();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
