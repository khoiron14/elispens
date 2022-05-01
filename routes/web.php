<?php

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

Route::get('/', function () {
    return view('welcome');
});

//  Detail
Route::get('/detail', function () {
    return view('details.detailsExample');
});

// Register

Route::get('/register-dosen', function() {
    return view('auth.custom.register');
});


// Register mahasiswa

Route::get('/register-mahasiswa', function() {
    return view('auth.custom.registerMhs');
});

Route::get('/login-user', function() {
    return view('auth.custom.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
