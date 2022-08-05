<?php

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


/* User */
Route::get('/',[UserController::class, 'home'])->name("home");
Route::get('/signin',[UserController::class, 'signin'])->name("signin");
Route::post('/signinSubmitted',[UserController::class, 'signinSubmitted'])->name("signinSubmitted");
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/forgetPassword',[UserController::class, 'forgetPassword'])->name("forgetPassword");
Route::post('/forgotPasswordSubmitted',[UserController::class, 'forgotPasswordSubmitted'])->name("forgotPasswordSubmitted");
Route::get('/resetPassword/{user_id}',[UserController::class, 'resetPassword'])->name("resetPassword");
Route::post('/resetPasswordSubmitted',[UserController::class, 'resetPasswordSubmitted'])->name("resetPasswordSubmitted");

/* Admin */
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('adminDash');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('adminProfile');
Route::get('/admin/edit', [AdminController::class, 'editProfile'])->name('adminEditProfile');
Route::post('/admin/editSubmitted', [AdminController::class, 'editProfileSubmitted'])->name('adminEditProfileSubmitted');
Route::get('/admin/createDirector', [AdminController::class, 'adminCreateDirector'])->name('adminCreateDirector');
Route::post('/admin/createDirector', [AdminController::class, 'adminCreateDirectorSubmitted'])->name('adminCreateDirectorSubmitted');
Route::get('/admin/list/director', [AdminController::class, 'directorList'])->name('adminDirectorList');
Route::get('/admin/update/director/{id}', [AdminController::class, 'directorUpdate'])->name('adminDirectorUpdate');
Route::post('/admin/update/director/{id}', [AdminController::class, 'directorUpdateSubmitted'])->name('adminDirectorUpdateSubmitted');
Route::get('/admin/update/status/director/{user_id}/{status_code}', [AdminController::class, 'directorStatusUpdate'])->name('adminDirectorStatusUpdate');
Route::post('/admin/edit/upload', [AdminController::class, 'adminImageUpload'])->name('adminImageUploadsubmitted');
Route::get('/admin/change/password', [AdminController::class, 'changePassword'])->name('adminChangePassword');
Route::post('/admin/change/password/submitted', [AdminController::class, 'changePasswordSubmitted'])->name('adminChangePasswordSubmitted');



/* Director */
Route::get('/director/dashboard', [DirectorController::class, 'dashboard'])->name('directorDash');
Route::get('/director/profile', [DirectorController::class, 'profile'])->name('directorProfile');
Route::get('/director/edit', [DirectorController::class, 'EditProfile'])->name('directorEditProfile');
Route::post('/director/edit', [DirectorController::class, 'editProfileSubmitted'])->name('directorEditProfileSubmitted');
Route::post('/director/edit/upload', [DirectorController::class, 'directorImageUpload'])->name('directorImageUploadsubmitted');
Route::get('/director/components', [ComponentController::class, 'components'])->name('components');
Route::post('/director/components', [ComponentController::class, 'addComponents'])->name('directorAddComponents');
Route::get('/director/club/committees', [DirectorController::class, 'committeeList'])->name('directorCommitteeList');
Route::get('/director/executives/assign', [DirectorController::class, 'assignExecutive'])->name('directorAssignExecutive');
Route::get('/director/executives/assign/remove/{id}', [DirectorController::class, 'removeAssignExecutive'])->name('directorRemoveAssignExecutive');
Route::post('/director/executives/assign', [DirectorController::class, 'assignExecutiveSubmitted'])->name('directorAssignExecutiveSubmitted');
Route::get('/director/executives/confirm', [DirectorController::class, 'confirmExecutive'])->name('directorConfirmExecutive');
Route::get('/director/clubs/committee/{club_id}', [DirectorController::class, 'clubWiseCommitteeList'])->name('directorClubWiseCommitteeList');
Route::get('/director/club/committees/{club_id}/{committee_no}', [DirectorController::class, 'committeeWiseExecutiveList'])->name('directorCommitteeWiseExecutiveList');




/* Member */
Route::get('/member/dashboard', [MemberController::class, 'dashboard'])->name('memberDash');
Route::get('/member/profile', [MemberController::class, 'profile'])->name('memberProfile');
Route::get('/member/edit', [MemberController::class, 'EditProfile'])->name('memberEditProfile');
Route::post('/member/edit', [MemberController::class, 'editProfileSubmitted'])->name('memberEditProfileSubmitted');
Route::post('/member/edit/upload', [MemberController::class, 'memberImageUpload'])->name('memberImageUploadsubmitted');


/* Executive */
Route::get('/executive/dashboard', [ExecutiveController::class, 'dashboard'])->name('executiveDash');
Route::get('/executive/profile', [ExecutiveController::class, 'profile'])->name('executiveProfile');
Route::get('/executive/edit', [ExecutiveController::class, 'EditProfile'])->name('executiveEditProfile');
Route::post('/executive/edit', [ExecutiveController::class, 'editProfileSubmitted'])->name('executiveEditProfileSubmitted');
Route::post('/executive/edit/upload', [ExecutiveController::class, 'executiveImageUpload'])->name('executiveImageUpload');

//Executive->Member
Route::get('/executive/AllMembers', [ExecutiveController::class, 'ViewAllMamber'])->name('executiveViewAllMamber');
Route::get('/executive/NewMembers', [ExecutiveController::class, 'CreateNewMamber'])->name('executiveCreateNewMamber');
Route::post('/executive/NewMembers', [ExecutiveController::class, 'CreateMamber'])->name('executiveCreateMambersubmitted');
Route::get('/executive/update/status/member/{user_id}/{status_code}', [ExecutiveController::class, 'MemberStatusUpdate'])->name('memberexecutiveStatusUpdate');
Route::get('/executive/update/member/{user_id}', [ExecutiveController::class, 'UpdateMamber'])->name('executiveUpdateMamber');
Route::post('/executive/update/member/{user_id}', [ExecutiveController::class, 'UpdateMemberSubmitted'])->name('executiveUpdateMemberSubmitted');

//notice
Route::get('/executive/sendNotice', [ExecutiveController::class, 'SendNotice'])->name('SendNoticeMamber');
Route::post('/executive/sendNoticepost', [ExecutiveController::class, 'SendNoticePost'])->name('PostNoticeMamber');
Route::get('/executive/ViewNotice', [ExecutiveController::class, 'ViewNotice'])->name('ViewAllNotice');
// Route::get('/member/dashboard', [MemberController::class, 'ViewNotice'])->name('ViewAllNotice');



//Executive Application
Route::get('/executive/application/compose', [ApplicationController::class, 'applicationCompose'])
->name('executiveApplicationCompose')->middleware('validExecutive');
Route::post('/executive/application/composeSubmitted', [ApplicationController::class, 'applicationComposeSubmitted'])
->name('executiveApplicationComposeSubmitted')->middleware('validExecutive');

Route::get('/executive/application/approved', [ApplicationController::class, 'applicationApproved'])
->name('executiveApplicationApproved')->middleware('validExecutive');
Route::get('/executive/application/pending', [ApplicationController::class, 'applicationPending'])
->name('executiveApplicationPending')->middleware('validExecutive');
Route::get('/executive/application/rejected', [ApplicationController::class, 'applicationRejected'])
->name('executiveApplicationRejected')->middleware('validExecutive');
Route::get('/executive/application/read/{id}', [ApplicationController::class, 'applicationRead'])
->name('executiveApplicationRead')->middleware('validExecutive');
Route::get('/executive/allApplication/', [ApplicationController::class, 'allApplication'])
->name('executiveAllApplication')->middleware('validExecutive');

Route::get('/executive/application/search', [ApplicationController::class, 'searchExecutiveApplication'])
    ->name('searchExecutiveApplication')->middleware('validExecutive');

/* Director Application */
Route::get('/director/application', [DirectorController::class, 'allApplication'])->name('directorAllApplication');
Route::get('/director/application/read/{id}', [DirectorController::class, 'applicationRead'])
->name('directorApplicationRead');

Route::get('/director/application/removeComponent/{id}/{application_id}/{remarks}', [ApplicationController::class, 'removeComponent'])
->name('directorRemoveComponent')->middleware('validDirector');

Route::get('/director/application/rejectApplication/{application_id}/{remarks}', [ApplicationController::class, 'rejectApplication'])
->name('directorRejectApplication')->middleware('validDirector');

Route::post('/director/application/updateSubmitted', [ApplicationController::class, 'applicationUpdateSubmitted'])
->name('directorApplicationUpdateSubmitted')->middleware('validDirector');

Route::get('/director/application/{id}/clubInfo', [DirectorController::class, 'clubWiseApplication'])
->name('clubWiseApplication');



/* Director Club */
Route::get('/director/club/allClub', [DirectorController::class, 'allClub'])->name('directorAllClub');
Route::get('/director/club/allClub/{id}', [DirectorController::class, 'clubInfo'])->name('directorClubInfo');

Route::get('/director/club/create', [DirectorController::class, 'createClub'])->name('directorCreateClub');
Route::post('/director/club/createSubmitted', [DirectorController::class, 'createClubSubmitted'])->name('directorCreateClubSubmitted');



Route::get('/print', [ClubController::class, 'print'])->name('print');
