<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Admins\DanhMucController;
use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\Admins\ThongKeController;
use App\Http\Controllers\Clients\ClientController;
use App\Http\Middleware\CheckRouteAdminMiddleware;
use App\Http\Controllers\Admins\TaiKhoanController;
use App\Http\Controllers\Clients\GioHangController;

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

Route::get('login', [AuthController::class, 'showFormLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showFormRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('nam', [ClientController::class, 'san_pham_nam'])->name('nam');
// Route::get('nu', [ClientController::class, 'san_pham_nu'])->name('nu');
// Route::get('tre_em', [ClientController::class, 'san_pham_tre_em'])->name('tre_em');
// Route::get('giam_gia', [ClientController::class, 'san_pham_giam_gia'])->name('giam_gia');
// Route::get('/san_pham_chi_tiet/{id}', [ClientController::class, 'san_pham_chi_tiet'])->name('san_pham_chi_tiet');

// Route::resource('san_pham', SanPhamController::class)->middleware(['auth', 'auth.admin']);
// Route::resource('danh_muc', DanhMucController::class)->middleware(['auth', 'auth.admin']);
// Route::resource('tai_khoan', TaiKhoanController::class)->middleware(['auth', 'auth.admin']);
// Route::resource('home', HomeController::class)->middleware('auth');
Route::resource('home', HomeController::class);

Route::get('nam', [ClientController::class, 'san_pham_nam'])->name('nam');
Route::get('nu', [ClientController::class, 'san_pham_nu'])->name('nu');
Route::get('tre_em', [ClientController::class, 'san_pham_tre_em'])->name('tre_em');
Route::get('giam_gia', [ClientController::class, 'san_pham_giam_gia'])->name('giam_gia');
Route::get('/san_pham_chi_tiet/{id}', [ClientController::class, 'san_pham_chi_tiet'])->name('san_pham_chi_tiet');
Route::middleware('auth')->group(function () {
    Route::post('/binh_luan', [BinhLuanController::class, 'store'])->name('binh_luan.store');
    Route::resource('gio_hang', GioHangController::class);
    Route::get('don_hang/create', [DonHangController::class, 'create'])->name('don_hang.create');
    Route::post('don_hang/store', [DonHangController::class, 'store'])->name('don_hang.store');
    
        Route::middleware('auth.admin')->group(function () {
            Route::resource('tai_khoan', TaiKhoanController::class);
            Route::resource('san_pham', SanPhamController::class);
            Route::resource('danh_muc', DanhMucController::class);
            
            Route::get('/thong-ke', [ThongKeController::class, 'show'])->name('thongke.show');
        });
});
