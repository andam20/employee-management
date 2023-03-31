<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FounderController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ManagerLineController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/employee-export', [EmployeeController::class, 'exportIntoExcel'])->name('employeeExport');
Route::get('/manager-export', [ManagerController::class, 'exportIntoExcel'])->name('managerExport');
Route::get('/manager-line-export', [ManagerLineController::class, 'exportIntoExcel'])->name('managerLineExport');
Route::get('/founder-export', [FounderController::class, 'exportIntoExcel'])->name('founderExport');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("/employee", EmployeeController::class);
Route::resource("/manager", ManagerController::class);
Route::resource("/manager-line", ManagerLineController::class);
Route::resource("/founder", FounderController::class);



require __DIR__.'/auth.php';
