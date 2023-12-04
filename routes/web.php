<?php
namespace App\Http\Controllers;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::post('/submit-form', [HomeController::class, 'submitForm'])->name('submitForm');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registration', [RegistrationController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/registration', [RegistrationController::class, 'register'])->name('register.submit');
Route::get('/registration', [RegistrationController::class, 'showRegistrationForm'])->name('registration');