<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdrawl;
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
                ],
                'title' => 'Register a User',
                'users' => User::orderBy('id', 'desc')->paginate(3)
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

    // Edit User
    public function edit($user){
        if(Auth::guest()){
            return redirect('/login');
        } else {
            return view('users.edit',[
                'title' => 'Edit User',
                'user' => User::find($user),
                'roles' => [
                    [
                        'name' => 'Admin',
                        'value' => 'admin',
                    ],
                    [
                        'name' => 'Investor',
                        'value' => 'investor',
                    ],
                ],
            ]);
        }
    }

    // Update User
    public function update(Request $request, User $user){
        $formFields = $request->validate([
            'name' => 'required',
            'username' => ['required', Rule::unique('users', 'username')->ignore($user->id)],
            
            'role'      => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
        ]);
        $user->update($formFields);
        return redirect('/users')->with('success', 'User updated successfully.');
    }

    // Delete User
    public function destroy( User $user){
        $user->delete();
        
        return redirect('/users')->with('success', 'User deleted successfully!');
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
                'users' => User::paginate(5),
            ]);
        }
    }

    // Personal profile page
    public function personal(){
        if(Auth::guest()){
            return redirect('/login');
        } else {
            return view('users.profile', [
                'title' => 'Profile',
                'user' => Auth::user(),
                'deposits' => Deposit::where('user_id', Auth::id())->paginate(3, ['*'], 'deposits'),
                'withdrawls' => Withdrawl::where('user_id', Auth::id())->paginate(3, ['*'], 'withdrawls'),
                'user_id' => auth()->user()->id,
                'total_deposit' => Deposit::where('user_id', Auth::id())->sum('amount'),
                'total_withdrawl' => Withdrawl::where('user_id', Auth::id())->sum('amount'),
                'users' => User::all(),
            ]);
        };
    }

    // View Signle user
    public function single(User $user){
        if(Auth::guest()){
            return redirect('/login');
        } else {
            return view('users.single', [
                'title' => $user->name,
                'user' => $user,
                'deposits' => Deposit::where('user_id', $user->id)->paginate(3, ['*'], 'deposits'),
                'withdrawls' => Withdrawl::where('user_id', $user->id)->paginate(3, ['*'], 'withdrawls'),
                'total_deposit' => Deposit::where('user_id', $user->id)->sum('amount'),
                'total_withdrawl' => Withdrawl::where('user_id', $user->id)->sum('amount'),
                'users' => User::all(),
            ]);
        };
    }
}
