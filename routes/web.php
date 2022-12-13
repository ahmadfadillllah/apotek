<?php

use App\Http\Controllers\AprioriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemsetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
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
    return redirect()->route('dashboard.index');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'loginpost'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/dashboard/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/dashboard/transaksi/insert', [TransaksiController::class, 'insert'])->name('transaksi.insert');

    Route::get('/dashboard/itemset', [ItemsetController::class, 'index'])->name('itemset.index');
    Route::get('/dashboard/itemset/destroy/{id}', [ItemsetController::class, 'destroy'])->name('itemset.destroy');
    Route::post('/dashboard/itemset/import', [ItemsetController::class, 'import'])->name('itemset.import');

    Route::get('/dashboard/apriori', [AprioriController::class, 'index'])->name('apriori.index');
    Route::post('/dashboard/apriori/proses', [AprioriController::class, 'proses'])->name('apriori.proses');

    Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/dashboard/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/dashboard/change-password', [ChangePasswordController::class, 'index'])->name('changepassword.index');
    Route::post('/dashboard/change-password/update', [ChangePasswordController::class, 'update'])->name('changepassword.update');

});


