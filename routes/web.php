<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Petugas\OnProgressController;
use App\Http\Controllers\Petugas\VerifikasiController;
use App\Http\Controllers\Petugas\PengaduanAdminController;

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


//USER

Route::group(['middleware' =>['auth']],  function () {

    Route::resource('/home', UserController::class);
    Route::get('/pengaduan', [UserController::class, 'pengaduan'])->name('pengaduan');
    Route::get('/laporan', [UserController::class, 'laporan'])->name('sim.laporan');


});



Route::get('/form-register', [RegisterController::class, 'formRegister'])->name('form-register');
Route::post('form-register/store', [RegisterController::class, 'storePengaduan'])->name('sim.storePengaduan');
Route::get('/login-mas', [LoginController::class,'loginMas'])->name('login.mas');


Route::get('logout', [LoginController::class,'logout']);


//ADMIN
Route::get('/admin', [LoginController::class, 'formLoginAdmin'])->name('admin');
Route::get('/login', [LoginController::class,'login']);
Route::get('/form-login', [LoginController::class, 'formLogin'])->name('form-login');


Route::group(['middleware' =>['masyarakat']],  function () {

    Route::resource('dashboard-admin', DashboardController::class);
    Route::resource('pengaduan-admin', PengaduanController::class);
    Route::resource('tanggapan', TanggapanController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('masyarakat', MasyarakatController::class);
    Route::get('/laporan-admin', [DashboardController::class, 'laporan'])->name('laporan.admin');
    // Route::get('/pdf', [DashboardController::class, 'exportPDF']);
    Route::get('report/export-pdf', [DashboardController::class, 'exportPDF'])->name('report.export-pdf');
    // Route::get('report-export-pdf-date/{tglawal}/{tglakhir}', [DashboardController::class, 'exportPDFdate'])->name('report-export-pdf-date');
    route::get('/pdf-date/{tglawal}/{tglakhir}'.'DashboardController@exportPDFdate')->name('pdf-date');
    Route::post('getLaporan', [DashboardController::class, 'getLaporan'])->name('laporan.getLaporan');
    Route::get('laporan/cetak/{from}/{to}', [DashboardController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');
});
//PETUGAS

Route::group(['middleware' =>['petugas']],  function () {

    Route::resource('petugas-home', PengaduanAdminController::class);
    Route::get('/petugas-pengaduan', [PengaduanAdminController::class, 'Pengaduan'])->name('petugas-pengaduan');
    Route::get('/pengaduan-selesai', [PengaduanAdminController::class, 'Selesai'])->name('pengaduan.selesai');
    Route::resource('/pengaduan-verifikasi', VerifikasiController::class);
    Route::resource('/pengaduan-onprogress', OnProgressController::class);

});



