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
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Localization
Route::get('lang/{locale}', [App\Http\Controllers\Localization\LocalizationController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Dashboard\views\IndexController::class, 'index']);
    
    // Company
    Route::get('companies', [App\Http\Controllers\Company\views\IndexController::class, 'index'])->name('companies');
    Route::prefix('company')->group( function () {
            // Create
            Route::get('/create', [App\Http\Controllers\Company\views\CreateController::class, 'create'])->name('company.create');
            Route::post('/store', [App\Http\Controllers\Company\logics\StoreController::class, 'store'])->name('company.store');

            //Update
            Route::get('/{id}', [App\Http\Controllers\Company\views\ShowController::class, 'show'])->name('company.show');
            Route::put('/{id}', [App\Http\Controllers\Company\logics\UpdateController::class, 'update'])->name('company.update');
            
            //Delete
            Route::delete('/{id}', [App\Http\Controllers\Company\logics\DestroyController::class, 'destroy'])->name('company.destroy');
    });
    
    // Employee
    Route::get('employees', [App\Http\Controllers\Employee\views\IndexController::class, 'index'])->name('employees');
    Route::prefix('employee')->group( function () {
            // Create
            Route::get('/create', [App\Http\Controllers\Employee\views\CreateController::class, 'create'])->name('employee.create');
            Route::post('/store', [App\Http\Controllers\Employee\logics\StoreController::class, 'store'])->name('employee.store');

            //Update
            Route::get('/{id}', [App\Http\Controllers\Employee\views\ShowController::class, 'show'])->name('employee.show');
            Route::put('/{id}', [App\Http\Controllers\Employee\logics\UpdateController::class, 'update'])->name('employee.update');
            
            //Delete
            Route::delete('/{id}', [App\Http\Controllers\Employee\logics\DestroyController::class, 'destroy'])->name('employee.destroy');
    });
});
