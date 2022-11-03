<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'transaction_date',
        'transaction_type',
        'transaction_id',
        'amount',
        'verified',
        'comments'
    ];
}
