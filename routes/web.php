<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;


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

/* User */
Route::get('/',[UserController::class, 'home'])->name("home");
Route::get('/signin',[UserController::class, 'signin'])->name("signin");
Route::get('/singup',[UserController::class, 'singup'])->name("singup");
