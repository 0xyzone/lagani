<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    // View Homepage
    public function view()
    {
        if (Auth::guest()) {
            return redirect('/login');
        } else {
            return view('index');
        }
    }

    public function login()
    {
        if (Auth::guest()) {
            return view('users.login');
        } else {
            return redirect('/');
        }
    }
}
