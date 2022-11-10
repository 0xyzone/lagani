<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawl extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'transaction_date',
        'cheque_no',
        'amount',
        'verified',
        'comments'
    ];
}
