<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    // Deposit Form View
    public function view()
    {
        if (Auth::guest()) {
            return redirect('/login');
        } else {
            return view('transactions.deposit', [
                'title' => 'Deposit Form',
                'users' => User::all(),
            ]);
        };
    }

    // Store Deposit
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'user_id' => ['required'],
            'transaction_date' => ['required'],
            'transaction_id' => ['required'],
            'amount' => ['required'],
            'verified' => ['required'],
            'comments' => '',
        ]);

        Deposit::create($formFields);

        return redirect('/transactions')->with('success', 'Deposition recorded successfully.');
    }

    // Edit Deposit
    public function edit($deposit)
    {
        if (Auth::guest()) {
            return redirect('/login');
        } else {
            return view('transactions.depositEdit', [
                'title' => 'Edit Deposits',
                'deposit' => Deposit::find($deposit),
                'users' => User::all(),
            ]);
        }
    }

    // Update Deposit
    public function update(Request $request, Deposit $deposit)
    {
        $formFields = $request->validate([
            'user_id' => ['required'],
            'transaction_date' => ['required'],
            'transaction_id' => ['required'],
            'amount' => ['required'],
            'verified' => ['required'],
            'comments' => '',
        ]);
        $deposit->update($formFields);
        return redirect('/transactions')->with('success', 'Deposition entry updated successfully.');
    }

    // Delete Deposit
    public function destroy(Deposit $deposit)
    {
        $deposit->delete();

        return redirect('/transactions')->with('success', 'Deposit Entry deleted successfully!');
    }
}
