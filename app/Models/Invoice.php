<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory, UuidTrait;

    public $fillable = ['attempt', 'last_attempt', 'price', 'charged_at', 'tariff', 'phone', 'status', 'user_id'];
}
