<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnhSanPham extends Model
{
    use HasFactory;
    protected $table = "hinh_anh_san_phams";
    protected $fillable = [
        'san_pham_id',
        'link_hinh_anh',
    ];

    public function sanPham(){
        return $this->belongsTo(SanPham::class);
    }
}
