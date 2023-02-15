<?php

use App\Http\Controllers\Client\BillController;
use App\Http\Controllers\Client\InvoiceController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Controllers\Client\ProfileController;
use Illuminate\Support\Facades\Route;

/**
 * Business Menu
 */
Route::name('invoiceMenu.')
    ->prefix('invoice')
    ->group(function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('index');
    });

/**
 * Client menu
 */
Route::name('billMenu.')
    ->prefix('bill')
    ->group(function () {
        Route::get('/', [BillController::class, 'index'])->name('index');
    });

/**
 * User menu
 */
Route::name('paymentMenu.')
    ->prefix('payment')
    ->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
    });

/**
 * Admin menu
 */
Route::name('profileMenu.')
    ->prefix('profile')
    ->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
    });
