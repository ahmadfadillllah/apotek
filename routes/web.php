<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

    Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile.index');
});
