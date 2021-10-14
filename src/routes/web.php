<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
})->name('home');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');