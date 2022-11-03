<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // View Transaction Index
    public function view() {
        if(Auth::guest()){
            return redirect('/login');
        } else {
            return view('transactions.index');
        }
    }
}
