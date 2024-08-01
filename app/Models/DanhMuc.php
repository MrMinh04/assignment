<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DanhMuc extends Model
{
    use HasFactory;
    
    protected $table = 'danh_mucs';
    protected $fillable = [
        'ten_danh_muc',
        'mo_ta'
    ];
    public function sanPhams(){
        return $this->hasMany(SanPham::class);
    }
}
