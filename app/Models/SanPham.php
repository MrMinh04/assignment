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
}
