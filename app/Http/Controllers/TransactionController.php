<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdrawl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // View Transaction Index
    public function view() {
        if(Auth::guest()){
            return redirect('/login');
        } else {
            return view('transactions.index', [
                'title' => 'Transactions',
                'deposits' => Deposit::paginate(3, ['*'], 'deposits'),
                'withdrawls' => Withdrawl::paginate(3, ['*'], 'withdrawls'),
                'users' => User::all(),
            ]);
        }
    }
}
