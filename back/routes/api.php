<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

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
Route::get('/', function (){
    return view('welcome');
});
// student routes

// Route::post('/student/logIn', [StudentController::class, 'signIn']);
// leave routes
Route::apiresource('/leaves', LeaveController::class);
// admin route
Route::apiresource('/admins', AdminController::class);

// Route::post('/logIn', [AdminController::class, 'logIn']);
// Route::post('/admin/register', [AdminController::class, 'signUp']);

// Route::group(['middleware'=>['auth:sanctum']], function(){
//     Route::apiresource('/students', StudentController::class);
// });

Route::apiresource('/students', StudentController::class);
