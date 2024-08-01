<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

// use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $table = 'san_phams';
    public function danh_muc()
    {
        return $this->belongsTo(DanhMuc::class, 'danh_muc_id', 'id');
    }
    // app/Models/SanPham.php
public function hinh_anh_san_pham()
{
    return $this->hasMany(HinhAnhSanPham::class, 'san_pham_id', 'id');
}

    
    protected $fillable = [
        'ten_san_pham',
        'gia_san_pham',
        'gia_khuyen_mai',
        'hinh_anh',
        'so_luong',
        'luot_xem',
        'ngay_nhap',
        'mo_ta',
        'trang_thai',
        'danh_muc_id',
    ];
    public function danhMuc(){
        return $this->belongsTo(DanhMuc::class);
    }
    public function hinhAnhSanPham(){
        return $this->hasMany(HinhAnhSanPham::class);
    }
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class, 'id_danhmuc');
    }
    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class, 'san_pham_id');
    }
    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id');
    }
    
}
