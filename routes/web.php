<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Register

Auth::routes(['register' => false]);

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('register/{type}', [RegisterController::class, 'showRegistrationForm'])->name('register.create');
    Route::post('register', [RegisterController::class, 'register'])->name('register.store');
});
