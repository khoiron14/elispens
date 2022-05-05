<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes(['register' => false]);

Route::middleware('guest')->group(function () {
    Route::get('register', fn () => abort(404));
    Route::get('register/{type}', [RegisterController::class, 'showRegistrationForm'])->name('register.create');
    Route::post('register', [RegisterController::class, 'register'])->name('register.store');
});

Route::prefix('dashboard')->middleware(['auth', 'validated'])->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('users', UserController::class);
        Route::post('users/{user}/validation', [UserController::class, 'validation'])->name('users.validation');
        Route::resource('study-programs', StudyProgramController::class)->except('show')->names('study_programs');
        Route::resource('courses', CourseController::class)->except('show');
    });
});
