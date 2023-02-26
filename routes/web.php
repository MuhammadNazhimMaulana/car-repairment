<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\User\ProfileController;
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

Route::prefix('/user')->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

Route::prefix('/login')->group(function () {
    //Google
    Route::get('/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
    
    //Github
    Route::get('/github', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub'])->name('login.github');
    Route::get('/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);
});
