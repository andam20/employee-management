<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\APIEmployeeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Models\Employee;
use App\Models\Founder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


//protected routes  
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::resource('employeeAPI', APIEmployeeController::class);

    Route::get('/search', [APIEmployeeController::class, 'search']);

    Route::post("logout", [AuthController::class, 'logout']);

});


//public route
Route::post("login", [AuthController::class, 'login']);
Route::post("register", [AuthController::class, 'register']);