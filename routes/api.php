<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
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

Route::get('/test', function (Request $request) {
    return 'auth';
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('emp', function ($id) {
//     return ["name"=>"adam"];
// });


Route::get('get', [EmployeeController::class, 'index_employee']);


// Route::post('login', [ 'as' => 'login', 'uses' => 'AuthController@login']);
Route::post("login",[AuthController::class,'login']);