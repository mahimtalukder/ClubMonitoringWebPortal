<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DirectorController;


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
Route::post('/signinSubmitted',[UserController::class, 'signinSubmitted'])->name("signinSubmitted");
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/singup',[UserController::class, 'singup'])->name("singup");

/* Admin */
Route::get('/admin', [AdminController::class, 'dashboard'])->name('adminDash'); 

/* Director */
Route::get('/director', [DirectorController::class, 'dashboard'])->name('directorDash'); 
