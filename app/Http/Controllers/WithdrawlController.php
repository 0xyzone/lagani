<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdrawl;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class WithdrawlController extends Controller
{
    // Withdrawl Form View
    public function view()
    {
        if (Auth::guest()) {
            return redirect('/login');
        } else {
            return view('transactions.withdrawl', [
                'title' => 'Withdrawl Form',
                'users' => User::all(),
            ]);
        };
    }

    // Store Withdrawl
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'user_id' => ['required'],
            'transaction_date' => ['required'],
            'cheque_no' => ['required', Rule::unique('withdrawls', 'cheque_no')],
            'amount' => ['required'],
            'verified' => ['required'],
            'comments' => '',
        ]);

        Withdrawl::create($formFields);

        return redirect('/transactions')->with('success', 'Withdrawl recorded successfully.');
    }

    // Edit Withdrawl
    public function edit($withdrawl)
    {
        if (Auth::guest()) {
            return redirect('/login');
        } else {
            return view('transactions.withdrawlEdit', [
                'title' => 'Edit withdrawls',
                'withdrawl' => Withdrawl::find($withdrawl),
                'users' => User::all(),
            ]);
        }
    }

    // Update Withdrawl
    public function update(Request $request, Withdrawl $withdrawl)
    {
        $formFields = $request->validate([
            'user_id' => ['required'],
            'transaction_date' => ['required'],
            'cheque_no' => ['required', Rule::unique('withdrawls', 'cheque_no')->ignore($withdrawl['id'])],
            'amount' => ['required'],
            'verified' => ['required'],
            'comments' => '',
        ]);
        $withdrawl->update($formFields);
        return redirect('/transactions')->with('success', 'Withdrawl entry updated successfully.');
    }

    // Delete withdrawl
    public function destroy(Withdrawl $withdrawl)
    {
        $withdrawl->delete();

        return redirect('/transactions')->with('success', 'Withdrawl Entry deleted successfully!');
    }
}
