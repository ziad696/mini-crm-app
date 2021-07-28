<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Route::get('/', function () {
|     return view('welcome');
| });
*/

// Authentication Routes...
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\FE\IndexController::class, 'index']);
    
    // Company
    Route::get('companies', [App\Http\Controllers\Company\FE\IndexController::class, 'index'])->name('companies');
    Route::prefix('company')->group( function () {
            // Create
            Route::get('/create', [App\Http\Controllers\Company\FE\CreateController::class, 'create'])->name('company.create');
            Route::post('/store', [App\Http\Controllers\Company\BE\StoreController::class, 'store'])->name('company.store');

            //Update
            Route::get('/{id}', [App\Http\Controllers\Company\FE\ShowController::class, 'show'])->name('company.show');
            Route::put('/{id}', [App\Http\Controllers\Company\BE\UpdateController::class, 'update'])->name('company.update');
            
            //Delete
            Route::delete('/{id}', [App\Http\Controllers\Company\BE\DestroyController::class, 'destroy'])->name('company.destroy');
    });
    
    // Employee
    Route::get('employees', [App\Http\Controllers\Employee\FE\IndexController::class, 'index'])->name('employees');
    Route::prefix('employee')->group( function () {
            // Create
            Route::get('/create', [App\Http\Controllers\Employee\FE\CreateController::class, 'create'])->name('employee.create');
            Route::post('/store', [App\Http\Controllers\Employee\BE\StoreController::class, 'store'])->name('employee.store');

            //Update
            Route::get('/{id}', [App\Http\Controllers\Employee\FE\ShowController::class, 'show'])->name('employee.show');
            Route::put('/{id}', [App\Http\Controllers\Employee\BE\UpdateController::class, 'update'])->name('employee.update');
            
            //Delete
            Route::delete('/{id}', [App\Http\Controllers\Employee\BE\DestroyController::class, 'destroy'])->name('employee.destroy');
    });
});
