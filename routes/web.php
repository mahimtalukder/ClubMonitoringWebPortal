<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ExecutiveController;


/* User */
Route::get('/',[UserController::class, 'home'])->name("home");
Route::get('/signin',[UserController::class, 'signin'])->name("signin");
Route::post('/signinSubmitted',[UserController::class, 'signinSubmitted'])->name("signinSubmitted");
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/singup',[UserController::class, 'singup'])->name("singup");

/* Admin */
Route::get('/admin/dash', [AdminController::class, 'dashboard'])->name('adminDash');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('profile');
Route::get('/admin/edit', [AdminController::class, 'editProfile'])->name('editProfile');
Route::post('/admin/editSubmitted', [AdminController::class, 'editProfileSubmitted'])->name('editProfileSubmitted');

/* Director */
Route::get('/director', [DirectorController::class, 'dashboard'])->name('directorDash');

/* Member */
Route::get('/member', [MemberController::class, 'dashboard'])->name('memberDash');


/* Member */
Route::get('/executive', [ExecutiveController::class, 'dashboard'])->name('executiveDash');
