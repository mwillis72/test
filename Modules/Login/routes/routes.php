<?php

use Illuminate\Support\Facades\Route;
use Modules\Login\Controller\LoginController;
use Modules\Login\Controller\ChangePass;
use Modules\Login\Controller\ResetController;

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

Route::get('/login', [LoginController::class,'create'])->name('login');
Route::post('/store', [LoginController::class,'store']);
Route::get('/forgot-password', [ResetController::class,'forgotPasswordView'])->name('forgot-password');
Route::post('/recover', [ResetController::class,'sendEmail']);
Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
Route::post('/reset-password', [ChangePass::class, 'changePassword'])->name('password.update');