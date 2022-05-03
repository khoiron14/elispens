<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//  Detail
Route::get('/detail', function () {
    return view('details.detailsExample');
});

Auth::routes(['register' => false]);

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('register/{type}', [RegisterController::class, 'showRegistrationForm'])->name('register.create');
    Route::post('register', [RegisterController::class, 'register'])->name('register.store');
});

Route::prefix('dashboard')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('users', UserController::class);
        Route::post('users/{user}/validation', [UserController::class, 'validation'])->name('users.validation');
    });
});
