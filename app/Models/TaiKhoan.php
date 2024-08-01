<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'ho_ten',
        'anh_dai_dien',
        'ngay_sinh',
        'email ',
        'so_dien_thoai',
        'gioi_tinh',
        'dia_chi',
        'mat_khau',
        'chuc_vu_id',
        'trang_thai',
    ];
    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class, 'tai_khoan_id');
    }
}
