<?php

namespace App\Http\Controllers\Admins;

use App\Models\DanhMuc;
use App\Models\DonHang;
use App\Models\SanPham;
use App\Models\ThongKe;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThongKeController extends Controller
{
    public function updateStatistics()
    {
        
        // Lấy số lượng sản phẩm, đơn hàng, tài khoản và danh mục
        $soLuongSanPham = SanPham::count();
        $soLuongDonHang = DonHang::count();
        $soLuongTaiKhoan = TaiKhoan::count();
        $soLuongDanhMuc = DanhMuc::count();

        // Cập nhật bảng thống kê
        ThongKe::updateOrCreate(
            [], // Điều kiện tìm kiếm (trong trường hợp này là không cần điều kiện)
            [
                'so_luong_san_pham' => $soLuongSanPham,
                'so_luong_don_hang' => $soLuongDonHang,
                'so_luong_tai_khoan' => $soLuongTaiKhoan,
                'so_luong_danh_muc' => $soLuongDanhMuc
            ]
        );

        return response()->json(['message' => 'Statistics updated successfully.']);
    }
    public function update()
    {
        ThongKe::updateStatistics();
        
        return response()->json(['message' => 'Statistics updated successfully.']);
    }
    public function show()
    {
        ThongKe::updateStatistics();
        $thongKe = ThongKe::latest()->first(); // Lấy bản ghi mới nhất từ bảng thống kê
        return view('admins.thongke.index', compact('thongKe'));
    }
}
