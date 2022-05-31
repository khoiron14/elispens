<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\TeachHistoryController;
use App\Models\Lecturer;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('detail/{lecturer}', [HomeController::class, 'lecturerDetail'])->name('lecturer_detail');

Auth::routes(['register' => false]);

Route::middleware('guest')->group(function () {
    Route::get('register', fn () => abort(404));
    Route::get('register/{type}', [RegisterController::class, 'showRegistrationForm'])->name('register.create');
    Route::post('register', [RegisterController::class, 'register'])->name('register.store');
});

Route::prefix('dashboard')->middleware(['auth', 'validated'])->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('users', UserController::class);
        Route::post('users/{user}/validation', [UserController::class, 'validation'])->name('users.validation');
        Route::resource('study-programs', StudyProgramController::class)->except('show')->names('study_programs');
        Route::resource('courses', CourseController::class)->except('show');
    });
    Route::middleware('role:lecturer')->group(function () {
        Route::resource('educations', EducationController::class)->except('show');
        Route::resource('teach-histories', TeachHistoryController::class)->except('show')->names('teaches');
        Route::resource('certificates', CertificateController::class)->except('show');
    });
    Route::middleware('role:admin,lecturer,student')->group(function () {
        Route::get('profile/{user}', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    });
});
