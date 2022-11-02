<?php

use Illuminate\Support\Facades\Route;
use Modules\Signup\Controllers\SignupController;

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

Route::get('/register', [SignupController::class,'create']);

Route::post('reg/store', [SignupController::class,'store']);

Route::get('/read', [SignupController::class,'read']);