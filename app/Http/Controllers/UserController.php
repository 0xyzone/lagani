<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // View Registration Form
    public function showRegister()
    {
        if (Auth::guest()) {
            return redirect('/login');
        } else {
            return view('users.register', [
                'roles' => [
                    [
                        'name' => 'Admin',
                        'value' => 'admin',
                    ],
                    [
                        'name' => 'Investor',
                        'value' => 'investor',
                    ],
                ]
            ]);
        }
    }

    // Store User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'username' => ['required', Rule::unique('users', 'username')],
            'role'      => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8']
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        User::create($formFields);

        return redirect('/users/register')->with('success', 'User created successfully.');
    }

    // Login User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'username' => 'required',
            'password' => ['required', 'min:8']
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'You are now logged in!');
        }

        return back()->with(['error' => 'Invalid Credentials']);
    }

    // Log Out User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out successfully!');
    }

    // View User Main Page
    public function view() {
        if(Auth::guest()){
            return redirect('/login');
        } else {
            return view('users.index', [
                'title' => 'Users',
                'users' => User::all(),
            ]);
        }
    }
}
