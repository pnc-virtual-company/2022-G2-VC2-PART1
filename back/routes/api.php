<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SendEmailController;
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


// student routes
Route::post('/students/logIn', [LoginController::class, 'studentLogin']);
Route::put('/students/reset_password/{id}',[StudentController::class,'updatePassword']);


// admin route
Route::post('/admin/logIn', [LoginController::class, 'adminLogin']);
Route::post('/admin/register', [AdminController::class, 'signUp']);


Route::group(['prefix' => 'admin','middleware'=>['auth:sanctum']], function(){
    Route::put('/admins_profile/{id}',[AdminController::class,'updateImage']);
    Route::get('/admins',[AdminController::class,'index']);
    Route::apiresource('/students', StudentController::class);
    Route::apiresource('/leaves', LeaveController::class);
    Route::get('/leaves/ischeck/{id}',[LeaveController::class,'leaveChecked']);
    Route::get('/number_user', [StudentController::class,'amountOfstudent']);
    Route::get('/number_leave', [LeaveController::class,'amountOfleave']);
    Route::get('/leaves_nocheck', [LeaveController::class,'getLeavesNotCheck']);
    Route::post('/logOut', [AdminController::class, 'logout']);
    // send email
    Route::post('send-email', [SendEmailController::class, 'sendEmail']);
});

Route::group(['prefix' => 'students','middleware'=>['auth:sanctum']], function(){
    Route::post('/logout', [StudentController::class, 'logout']);
    // leave routes
    Route::apiresource('/leaves', LeaveController::class);
    // send email
    Route::post('/send-email', [SendEmailController::class, 'sendEmail']);
});




