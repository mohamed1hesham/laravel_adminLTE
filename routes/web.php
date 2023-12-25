<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'index'])->name('homepage');
//signup
Route::get('/registeration', [SignupController::class, 'index'])->name('signup_page');
Route::post('/reg', [SignupController::class, 'store'])->name('signup');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'checkLogin'])->name('checkData');

//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//
//Route::get('/admin', [LoginController::class, 'admin_dash'])->name('admin_dashboard');
Route::get('/admins', [LoginController::class, 'admin_dash'])->middleware("auth")->name('admin_dashboard');
