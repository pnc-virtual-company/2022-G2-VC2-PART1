<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;

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

// admin route
Route::post('/admin/logIn', [LoginController::class, 'adminLogin']);
Route::post('/admin/register', [AdminController::class, 'signUp']);


Route::group(['prefix' => 'admin','middleware'=>['auth:sanctum']], function(){
    Route::apiresource('/students', StudentController::class);
    Route::post('/logOut', [AdminController::class, 'logout']);
});

Route::group(['prefix' => 'students','middleware'=>['auth:sanctum']], function(){
    Route::post('/logout', [StudentController::class, 'logout']);
    // leave routes
    Route::apiresource('/leaves', LeaveController::class);
});



