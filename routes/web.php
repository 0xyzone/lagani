<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawlController;
use App\Http\Controllers\TransactionController;

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

// View User Main Page
Route::get('/users', [UserController::class, 'view']);

// Register an User -Show registration form
Route::get('/users/register', [UserController::class, 'showRegister']);

// Store User
Route::post('/users/store', [UserController::class, 'store']);

// Edit User
Route::get('/users/{user}/edit', [UserController::class, 'edit']);

// Update User
Route::put('/users/{user}/update', [UserController::class, 'update']);

// Delete User
Route::delete('/users/{user}/delete', [UserController::class, 'destroy']);

// Authenticate User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log Out User
Route::post('/logout', [UserController::class, 'logout']);

// View Transactions Index
Route::get('/transactions', [TransactionController::class, 'view']);

// Deposit Form View
Route::get('/transactions/deposit', [DepositController::class, 'view']);

// Store Deposit
Route::post('/transactions/deposit/store', [DepositController::class, 'store']);

// Edit Deposit
Route::get('/transactions/deposit/{deposit}/edit', [DepositController::class, 'edit']);

// Update Deposit
Route::put('/transactions/deposit/{deposit}/update', [DepositController::class, 'update']);

// Delete Deposit
Route::delete('/transactions/deposit/{deposit}/delete', [DepositController::class, 'destroy']);

// Withdrawl Form View
Route::get('/transactions/withdrawl', [WithdrawlController::class, 'view']);

// Store Withdrawl
Route::post('/transactions/withdrawl/store', [WithdrawlController::class, 'store']);

// Edit Deposit
Route::get('/transactions/withdrawl/{withdrawl}/edit', [WithdrawlController::class, 'edit']);

// Update Deposit
Route::put('/transactions/withdrawl/{withdrawl}/update', [WithdrawlController::class, 'update']);

// Delete Withdrawl
Route::delete('/transactions/withdrawl/{withdrawl}/delete', [WithdrawlController::class, 'destroy']);

// View Dashboard
Route::get('/dashboard', [DashboardController::class, 'view']);

// View personal profile page
Route::get('/profile', [UserController::class, 'personal']);

// Single User Page
Route::get('/users/{user}', [UserController::class, 'single']);