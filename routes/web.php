<?php

use App\Http\Controllers\Admins\DanhMucController;
use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\Admins\TaiKhoanController;
use App\Http\Controllers\Clients\ClientController;
use App\Http\Controllers\Clients\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('nam', [ClientController::class, 'san_pham_nam'])->name('nam');
Route::get('nu', [ClientController::class, 'san_pham_nu'])->name('nu');
Route::get('tre_em', [ClientController::class, 'san_pham_tre_em'])->name('tre_em');
Route::get('giam_gia', [ClientController::class, 'san_pham_giam_gia'])->name('giam_gia');
Route::get('/san_pham_chi_tiet/{id}', [ClientController::class, 'san_pham_chi_tiet'])->name('san_pham_chi_tiet');

Route::resource('san_pham', SanPhamController::class);
Route::resource('danh_muc', DanhMucController::class);
Route::resource('tai_khoan', TaiKhoanController::class);
Route::resource('home', HomeController::class);