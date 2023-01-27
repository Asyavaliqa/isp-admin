<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ResellerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Reseller\BandwidthController;
use App\Http\Controllers\Reseller\BillController;
use App\Http\Controllers\Reseller\ClientController as ResellerClientController;
use App\Http\Controllers\Reseller\EmployeeController;
use App\Http\Controllers\Reseller\HistoryController;
use App\Http\Controllers\Reseller\ProfileController as ResellerProfileController;
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
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth',
])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

Route::middleware([
    'auth',
    'role:Admin',
])->name('admin.')->group(function () {
    Route::get('/reseller', [ResellerController::class, 'index'])->name('reseller');
    Route::get('/reseller/{id}', [ResellerController::class, 'detail'])->name('reseller.detail')->whereNumber('id');
    Route::get('/reseller/create', [ResellerController::class, 'create'])->name('reseller.create');
    Route::post('/reseller/create', [ResellerController::class, 'store']);

    Route::get('/client', [ClientController::class, 'index'])->name('client');

    Route::get('/user/{id}', [UserController::class, 'detail'])->name('user')->whereNumber('id');
});

Route::middleware([
    'auth',
    'role:Reseller_Owner',
])->name('reseller_owner.')->group(function () {
    Route::get('/clients', [ResellerClientController::class, 'index'])->name('client');
    Route::get('/bandwidth', [BandwidthController::class, 'index'])->name('bandwidth');
    Route::get('/bill', [BillController::class, 'index'])->name('bill');
    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/profile', [ResellerProfileController::class, 'index'])->name('profile');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
