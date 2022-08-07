<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ComponentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ApiDirectorController;
use App\Http\Controllers\ApiAdminController;
use App\Http\Controllers\ApiExecutiveController;
use App\Http\Controllers\ApiMemberController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/signinSubmitted',[ApiUserController::class, 'signinSubmitted']);
Route::post('/logout',[ApiUserController::class, 'logout']);

Route::post('/forgotPasswordSubmitted',[ApiUserController::class, 'forgotPasswordSubmitted']);
Route::post('/resetPasswordSubmitted',[ApiUserController::class, 'resetPasswordSubmitted']);

//Director
Route::get('/director/dashboard',[ApiDirectorController::class, 'dashboard']);
Route::get('/director/application', [ApiDirectorController::class, 'allApplication']);
Route::get('/director/application/read/{id}', [ApiDirectorController::class, 'applicationRead']);


//Admin
Route::get('/admin/dashboard',[ApiAdminController::class, 'dashboard']);



//Executive
Route::get('/executive/dashboard',[ApiExecutiveController::class, 'dashboard']);
Route::post('/executive/CreateMamber',[ApiExecutiveController::class, 'CreateMamber']);
Route::post('/executive/editProfileSubmitted',[ApiExecutiveController::class, 'editProfileSubmitted']);


//Member
Route::get('/member/dashboard',[ApiMemberController::class, 'dashboard']);