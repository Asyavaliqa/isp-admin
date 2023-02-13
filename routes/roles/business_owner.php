<?php

use App\Http\Controllers\Reseller\BillController;
use App\Http\Controllers\Reseller\ClientController;
use App\Http\Controllers\Reseller\EmployeeController;
use App\Http\Controllers\Reseller\PlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->name('clientMenu.')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index');
    Route::get('/{id?}', [ClientController::class, 'detail'])->name('detail')->whereNumber('id');
    Route::get('/create', [ClientController::class, 'create'])->name('create');
    Route::post('/create', [ClientController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('edit')->whereNumber('id');
    Route::post('/edit/{id}', [ClientController::class, 'update'])->name('update')->whereNumber('id');
});

Route::prefix('plan')->name('planMenu.')->group(function () {
    Route::get('/', [PlanController::class, 'index'])->name('index');
    Route::get('/{id?}', [PlanController::class, 'detail'])->name('detail')->whereNumber('id');
    Route::get('/create', [PlanController::class, 'create'])->name('create');
    Route::post('/create', [PlanController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [PlanController::class, 'edit'])->name('edit')->whereNumber('id');
    Route::post('/edit/{id}', [PlanController::class, 'update'])->name('update')->whereNumber('id');
    Route::get('/delete/{id}', [PlanController::class, 'delete'])->name('delete')->whereNumber('id');
});

Route::prefix('employee')->name('employeeMenu.')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/{id?}', [EmployeeController::class, 'detail'])->name('detail')->whereNumber('id');
    Route::get('/create', [EmployeeController::class, 'create'])->name('create');
    Route::post('/create', [EmployeeController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('edit')->whereNumber('id');
    Route::post('/edit/{id}', [EmployeeController::class, 'update'])->name('update')->whereNumber('id');
    Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete')->whereNumber('id');
});

Route::prefix('bill')->name('billMenu.')->group(function () {
    Route::get('/', [BillController::class, 'index'])->name('index');
    Route::get('/history', [BillController::class, 'index'])->name('history');
    Route::get('/{id?}', [BillController::class, 'show'])->name('detail')->whereNumber('id');
    Route::get('//bills', [BillController::class, 'bills'])->name('bill');

    Route::get('/outstanding', [BillController::class, 'outstanding'])->name('outstanding');
    Route::get('/paid', [BillController::class, 'paid'])->name('paid');
    Route::get('/paid-off', [BillController::class, 'paidOff'])->name('paidOff');
});
