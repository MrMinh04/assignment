<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongKe extends Model
{
    use HasFactory;

    protected $table = 'thong_kes';
    
    protected $fillable = [
        'so_luong_san_pham',
        'so_luong_don_hang',
        'so_luong_tai_khoan',
        'so_luong_danh_muc',
    ];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * Cập nhật số liệu thống kê.
     *
     * @return void
     */
    public static function updateStatistics()
    {
        $soLuongSanPham = \App\Models\SanPham::count();
        $soLuongDonHang = \App\Models\DonHang::count();
        $soLuongTaiKhoan = \App\Models\TaiKhoan::count();
        $soLuongDanhMuc = \App\Models\DanhMuc::count();

        self::updateOrCreate(
            [], // Điều kiện tìm kiếm
            [
                'so_luong_san_pham' => $soLuongSanPham,
                'so_luong_don_hang' => $soLuongDonHang,
                'so_luong_tai_khoan' => $soLuongTaiKhoan,
                'so_luong_danh_muc' => $soLuongDanhMuc
            ]
        );
    }
}
