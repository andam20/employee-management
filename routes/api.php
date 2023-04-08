<?php

use App\Models\Founder;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\APIEmployeeController;
use Illuminate\Support\Facades\Response as ResponseFacade;

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

    Route::resource('employees', APIEmployeeController::class);

    Route::get('/search', [APIEmployeeController::class, 'search']);

    Route::get('employees/{id}/managers', [APIEmployeeController::class,'managers']);

    Route::get('/export', [APIEmployeeController::class, 'export']);

    Route::post("logout", [AuthController::class, 'logout']);

});




//public route
Route::post("login", [AuthController::class, 'login']);
Route::post("register", [AuthController::class, 'register']);