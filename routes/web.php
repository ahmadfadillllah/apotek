<?php

use App\Http\Controllers\AprioriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPasienController;
use App\Http\Controllers\DataObatController;
use App\Http\Controllers\DataPasien;
use App\Http\Controllers\DataPasienController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\ItemsetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Routing\Route as RoutingRoute;
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
    return redirect()->route('dashboardpasien.index');
});

Route::get('/dashboard/home', [DashboardPasienController::class, 'index'])->name('dashboardpasien.index');
Route::get('/dashboard/home/cari', [DashboardPasienController::class, 'cari'])->name('dashboardpasien.cari');

Route::get('/login_page', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'loginpost'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'checkRole:perawat,dokter,apoteker,pasien,admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/data_pasien', [DataPasienController::class, 'index'])->name('datapasien.index');
    Route::post('/data_pasien/insert', [DataPasienController::class, 'insert'])->name('datapasien.insert');
    Route::post('/data_pasien/update/{id}', [DataPasienController::class, 'update'])->name('datapasien.update');
    Route::get('/data_pasien/destroy/{id}', [DataPasienController::class, 'destroy'])->name('datapasien.destroy');
    Route::get('/data_pasien/antrian/{pasien_id}', [DataPasienController::class, 'antrian'])->name('datapasien.antrian');

    Route::get('/data_obat', [DataObatController::class, 'index'])->name('dataobat.index');
    Route::post('/data_obat/insert', [DataObatController::class, 'insert'])->name('dataobat.insert');
    Route::post('/data_obat/update/{id}', [DataObatController::class, 'update'])->name('dataobat.update');
    Route::get('/data_obat/destroy/{id}', [DataObatController::class, 'destroy'])->name('dataobat.destroy');

    Route::get('/resep_obat', [ResepObatController::class, 'index'])->name('resepobat.index');
    Route::get('/resep_obat/{id}', [ResepObatController::class, 'resep'])->name('resepobat.resep');
    Route::post('/resep_obat/{id}/update', [ResepObatController::class, 'update'])->name('resepobat.update');
    Route::post('/resep_obat/{pasien_id}/insert', [ResepObatController::class, 'insert'])->name('resepobat.insert');
    Route::get('/resep_obat/{pasien_id}/destroy', [ResepObatController::class, 'destroy'])->name('resepobat.destroy');
    Route::get('/resep_obat/{id}/hapusobat', [ResepObatController::class, 'hapusobat'])->name('resepobat.hapusobat');
    Route::post('/resep_obat/keluhan/{pasien_id}', [ResepObatController::class, 'keluhan'])->name('resepobat.keluhan');

    Route::get('/dashboard/data_users', [DataUserController::class, 'index'])->name('datauser.index');
    Route::post('/dashboard/data_users/insert', [DataUserController::class, 'insert'])->name('datauser.insert');
    Route::post('/dashboard/data_users/update/{id}', [DataUserController::class, 'update'])->name('datauser.update');
    Route::get('/dashboard/data_users/changepassword/{id}', [DataUserController::class, 'changepassword'])->name('datauser.changepassword');
    Route::get('/dashboard/data_users/destroy/{id}', [DataUserController::class, 'destroy'])->name('datauser.destroy');

    Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/dashboard/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/dashboard/change-password', [ChangePasswordController::class, 'index'])->name('changepassword.index');
    Route::post('/dashboard/change-password/update', [ChangePasswordController::class, 'update'])->name('changepassword.update');

});


