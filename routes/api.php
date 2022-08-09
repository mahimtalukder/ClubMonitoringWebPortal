<?php

use App\Http\Controllers\ApiComponentController;
use Illuminate\Http\Request;
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
use App\Http\Controllers\ApiApplicationController;
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
Route::get('/director/application/removeComponent/{id}/{application_id}/{remarks}', [ApiApplicationController::class, 'removeComponent']);
Route::get('/director/application/rejectApplication/{application_id}/{remarks}', [ApiApplicationController::class, 'rejectApplication']);
Route::post('/director/changePasswordSubmitted', [ApiDirectorController::class, 'changePasswordSubmitted']);


//Admin
Route::get('/admin/dashboard',[ApiAdminController::class, 'dashboard']);
Route::get('/admin/list/director', [ApiAdminController::class, 'directorList']);
Route::post('/admin/create/director', [ApiAdminController::class, 'adminCreateDirectorSubmitted']);
Route::get('/admin/update/status/director/{user_id}/{status_code}', [ApiAdminController::class, 'directorStatusUpdate']);
Route::get('/admin/director/{id}', [ApiAdminController::class, 'directorInfo']);




//Executive
Route::get('/executive/dashboard',[ApiExecutiveController::class, 'dashboard']);
Route::post('/executive/CreateMamber',[ApiExecutiveController::class, 'CreateMamber']);
Route::post('/executive/editProfileSubmitted',[ApiExecutiveController::class, 'editProfileSubmitted']);
Route::get('/executive/list/member', [ApiExecutiveController::class, 'memberList']);
Route::get('/executive/update/status/member/{user_id}/{status_code}', [ApiExecutiveController::class, 'memberStatusUpdate']);
Route::get('/executive/member/{id}', [ApiExecutiveController::class, 'memberInfo']);


Route::post('/executive/sendNoticepost', [ApiExecutiveController::class, 'SendNoticePost']);

Route::post('/executive/ViewNotice', [ApiExecutiveController::class, 'ViewNotice']);


//Member
Route::get('/member/dashboard',[ApiMemberController::class, 'dashboard']);

//Component
Route::get('/component/list',[ApiComponentController::class, 'components']);
Route::post('/component/add',[ApiComponentController::class, 'addComponents']);
Route::get('/component/find/{name}',[ApiComponentController::class, 'IsComponentNameExist']);
Route::get('/component/delete/{id}',[ApiComponentController::class, 'deleteComponent']);
