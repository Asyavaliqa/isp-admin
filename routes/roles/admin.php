<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ResellerController;
use Illuminate\Support\Facades\Route;

/**
 * Business Menu
 */
Route::name('resellerMenu.')
->prefix('reseller')
->group(function () {
    Route::get('/', [ResellerController::class, 'index'])->name('index');
    Route::get('/{id}', [ResellerController::class, 'detail'])->name('detail')->whereNumber('id');
    Route::get('/create', [ResellerController::class, 'create'])->name('create');
    Route::post('/create', [ResellerController::class, 'store'])->name('store');
});

/**
 * Client menu
 */
Route::name('clientMenu.')
    ->prefix('client')
    ->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');
    });

/**
 * User menu
 */
Route::name('userMenu.')
    ->prefix('user')
    ->group(function () {
        Route::get('/{id}', [UserController::class, 'detail'])->name('detail')->whereNumber('id');
    });
