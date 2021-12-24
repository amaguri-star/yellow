<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
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

//HomeController
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// RegisterController
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('auth.register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register')->middleware('guest');

//LoginController
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

//ForgotController
Route::get('/forgot-password', [ForgotPasswordController::class, 'showEmailForm'])->name('password.request')->middleware('guest');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.request')->middleware('guest');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset')->middleware('guest');
Route::post('/reset-password', [ForgotPasswordController::class, 'ResetPassword'])->name('password.update')->middleware('guest');

//resources for each controller
Route::resource('tasks', TaskController::class)->only([
    'index', 'store', 'create', 'destroy',
])->middleware('auth');
