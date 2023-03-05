<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\User\{ProfileController, RepairmentController, UserPaymentController};
use App\Http\Controllers\Admin\{PaymentController};
use Illuminate\Support\Facades\Auth;

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

// Default Route
Route::get('/', function () {
    return view('welcome');
});

// Route Example
Route::prefix('/example')->group(function () {
    Route::get('/', [ExampleController::class, 'index']);
});

// Auth
Auth::routes();

// Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/user')->middleware('auth')->group(function () {

    //Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update']);

    //Repairment
    Route::get('/repairment', [RepairmentController::class, 'index'])->name('repairment');
    Route::get('/repairment/{id}', [RepairmentController::class, 'show'])->name('repairment.show');
    Route::put('/repairment/{id}', [RepairmentController::class, 'update']);
    Route::post('/repairment', [RepairmentController::class, 'store']);

    //Payment
    Route::get('/payment', [UserPaymentController::class, 'index'])->name('payment.user');
});

// For Admin
Route::prefix('/admin')->middleware('auth')->group(function () {

    //Payment
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::post('/payment/{id}', [PaymentController::class, 'store']);
});

Route::prefix('/login')->group(function () {
    //Google
    Route::get('/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
    
    //Github
    Route::get('/github', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub'])->name('login.github');
    Route::get('/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);
});
