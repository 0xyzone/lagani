<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdrawl;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // View Dashboard
    public function view(){
        if(Auth::guest()){
            return redirect('/login');
        }else{
            return view('dashboard.index', [
                'title' => 'Dashboard',
                'deposits' => Deposit::where('user_id', Auth::id())->paginate(3, ['*'], 'deposits'),
                'withdrawls' => Withdrawl::where('user_id', Auth::id())->paginate(3, ['*'], 'withdrawls'),
                'user_id' => auth()->user()->id,
                'total_deposit' => Deposit::where('user_id', Auth::id())->sum('amount'),
                'total_withdrawl' => Withdrawl::where('user_id', Auth::id())->sum('amount'),
                'users' => User::all(),
            ]);
        }
    }
}
