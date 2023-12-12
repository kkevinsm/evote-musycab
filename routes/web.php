<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\FormaturController;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\PilihanController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
})->name('welcome');

Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
Auth::routes();

// Admin
Route::middleware(['admin'])->group(function() {
    Route::resource('/admin', AdminController::class);

    Route::get('/admin/formatur/index', [FormaturController::class, 'index'])->name('formatur.index');
    Route::get('/admin/formatur/detail/{id}', [FormaturController::class, 'detail'])->name('formatur.detail');
    Route::post('/admin/formatur/tambah', [FormaturController::class, 'create'])->name('formatur.tambah');
    Route::post('/admin/formatur/update/{id}', [FormaturController::class, 'update'])->name('formatur.update');
    Route::post('/admin/formatur/hapus/{id}', [FormaturController::class, 'destroy'])->name('formatur.hapus');

    Route::post('/formatur/import', [FormaturController::class, 'import'])->name('formatur.import');

    Route::get('/admin/pilihan/reset', [AdminController::class, 'reset'])->name('admin.reset');
    
    Route::get('/admin/pemilih/index', [PemilihController::class, 'index'])->name('pemilih.index');
    Route::get('/admin/pemilih/detail/{id}', [PemilihController::class, 'detail'])->name('pemilih.detail');
    Route::post('/admin/pemilih/tambah', [PemilihController::class, 'create'])->name('pemilih.tambah');
    Route::post('/admin/pemilih/hapus/{id}', [PemilihController::class, 'destroy'])->name('pemilih.hapus');
    Route::get('/admin/pemilih/export', [PemilihController::class, 'export'])->name('pemilih.export');
    Route::get('/admin/pemilih/active', [PemilihController::class, 'active'])->name('active');
    Route::get('/admin/pemilih/non-active', [PemilihController::class, 'nonActive'])->name('non-active');

    Route::get('/admin/pilihan/index', [PilihanController::class, 'index'])->name('pilihan.index');
    Route::get('/admin/pilihan/{id}', [PilihanController::class, 'show'])->name('pilihan.show');
    Route::get('/admin/pilihan/{id}/{userId}', [PilihanController::class, 'pilihan'])->name('pilihan.pilihan');



    Route::post('/pemilih/import', [PemilihController::class, 'import'])->name('pemilih.import');
});

// Guest
Route::get('/guest', [GuestController::class, 'guest'])->name('guest.guest');
Route::get('/guest/ipm', [GuestController::class, 'ipm'])->name('guest.index');
Route::post('/guest/pilih/ipm', [GuestController::class, 'pilihipm'])->name('guest.pilih.ipm');
Route::get('/guest/terimakasih', [GuestController::class, 'terimakasih'])->name('terimakasih');

Route::post('/guest/pilih', [GuestController::class, 'submit'])->name('guest.submit');
// Route::post('/guest/logout', [GuestController::class, 'logout'])->name('guest.logout');
Route::get('hangker', function() {
    return view('hangker');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin/pemilih/export/view', [PemilihController::class, 'view'])->name('pemilih.pdf');
