<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaundryAdminController;
use App\Http\Controllers\LaundryCustomerController;
use App\Http\Controllers\UserController;
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

Route::get('', function () {
    return view('beranda');
});

Route::get('akun', [LaundryCustomerController::class, 'userrekap'])->name('akun');
    

Route::get('masuk', [UserController::class, 'masuk'])->name('masuk');
Route::post('masuk', [UserController::class, 'login_action'])->name('masuk.action');

Route::get('daftar', [UserController::class, 'register'])->name('daftar');
Route::post('daftar', [UserController::class, 'register_action'])->name('daftar.action');

Route::get('keluar', [UserController::class, 'logout'])->name('userkeluar');

Route::get('akun/order', [LaundryCustomerController::class, 'create'])->name('order.baru');
Route::post('akun/order', [LaundryCustomerController::class, 'store'])->name('order.input');

Route::get('akun/riwayat', [LaundryCustomerController::class, 'riwayat'])->name('history');

Route::get('akun/pengaturan', [LaundryCustomerController::class, 'pengaturanuser'])->name('pengaturanuser');
Route::post('akun/pengaturan', [LaundryCustomerController::class, 'updateProfile'])->name('pengaturanuser.action');


Route::get('administrator/masuk', [AdminController::class, 'masuk'])->name('adminlogin');
Route::post('administrator/masuk', [AdminController::class, 'adminlogin_action'])->name('adminlogin.action');

Route::get('administrator', [LaundryAdminController::class, 'userrekap'])->name('admindashboard');

Route::get('administrator/managepembayaran', [LaundryAdminController::class, 'pembayaran'])->name('managepembayaran');
Route::get('administrator/managepembayaran/edit/{id}', [LaundryAdminController::class, 'editpembayaran'])->name('editpembayaran');
Route::post('administrator/managepembayaran/edit/{id}', [LaundryAdminController::class, 'editpembayaran_action'])->name('editpembayaran.action');

Route::get('administrator/managelayanan', [LaundryAdminController::class, 'layanan'])->name('managelayanan');
Route::get('administrator/managelayanan/edit/{id}', [LaundryAdminController::class, 'editlayanan'])->name('editlayanan');
Route::post('administrator/managelayanan/edit/{id}', [LaundryAdminController::class, 'editlayanan_action'])->name('editlayanan.action');

Route::get('administrator/managejenis', [LaundryAdminController::class, 'jenis'])->name('managejenis');
Route::get('administrator/managejenis/edit/{id}', [LaundryAdminController::class, 'editjenis'])->name('editjenis');
Route::post('administrator/managejenis/edit/{id}', [LaundryAdminController::class, 'editjenis_action'])->name('editjenis.action');

Route::get('administrator/pengaturan', [LaundryAdminController::class, 'pengaturan'])->name('pengaturan');
Route::post('administrator/pengaturan', [LaundryAdminController::class, 'updateProfile'])->name('pengaturan.action');

Route::get('administrator/manageuser', [LaundryAdminController::class, 'user'])->name('manageuser');
Route::get('administrator/manageuser/edit/{id}', [LaundryAdminController::class, 'edituser'])->name('edituser');
Route::post('administrator/manageuser/edit/{id}', [LaundryAdminController::class, 'edituser_action'])->name('edituser.action');

Route::get('administrator/manageorder', [LaundryAdminController::class, 'order'])->name('manageorder');
Route::get('administrator/manageorder/edit/{id}', [LaundryAdminController::class, 'editorder'])->name('editorder');
Route::post('administrator/manageorder/edit/{id}', [LaundryAdminController::class, 'editorder_action'])->name('editorder.action');

Route::get('administrator/keluar', [AdminController::class, 'logout'])->name('keluar');
