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
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('adminDash');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('adminProfile');
Route::get('/admin/edit', [AdminController::class, 'editProfile'])->name('editProfile');
Route::post('/admin/editSubmitted', [AdminController::class, 'editProfileSubmitted'])->name('editProfileSubmitted');

/* Director */
Route::get('/director', [DirectorController::class, 'dashboard'])->name('directorDash');
Route::get('/director/profile', [DirectorController::class, 'profile'])->name('profile');
Route::get('/director/edit', [DirectorController::class, 'EditProfile'])->name('EditProfile');
Route::post('/director/edit', [DirectorController::class, 'editProfileSubmitted'])->name('editProfileSubmitted');

/* Member */
Route::get('/member', [MemberController::class, 'dashboard'])->name('memberDash');
Route::get('/member/profile', [MemberController::class, 'profile'])->name('profile');
Route::get('/member/edit', [MemberController::class, 'EditProfile'])->name('EditProfile');
Route::post('/member/edit', [MemberController::class, 'editProfileSubmitted'])->name('editProfileSubmitted');


/* Executive */
Route::get('/executive/dashboard', [ExecutiveController::class, 'dashboard'])->name('executiveDash');
Route::get('/executive/profile', [ExecutiveController::class, 'profile'])->name('profile');
Route::get('/executive/edit', [ExecutiveController::class, 'EditProfile'])->name('EditProfile');
Route::post('/executive/edit', [ExecutiveController::class, 'EditProfile'])->name('EditProfile');


//Test
Route::get('/test', function () {
    return view('director.viewApplications');
});
