<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'view']);

// View Login Page
Route::get('/login', [MainController::class, 'login']);

// Register an User -Show registration form
Route::get('/users/register', [UserController::class, 'showRegister']);

// Store User
Route::post('/users/store', [UserController::class, 'store']);

// Authenticate User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log Out User
Route::post('/logout', [UserController::class, 'logout']);

// View Transactions Index
Route::get('/transactions', [TransactionController::class, 'view']);
