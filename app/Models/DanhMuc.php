<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DanhMuc extends Model
{
    use HasFactory;
    // public function getList(){
    //     $listDanhMuc = DB::table('danh_mucs')
    //     ->orderBy('id', 'ASC')
    //     ->get();
    //     return $listDanhMuc;
    // }
    // public function createDanhMuc($data){
    //     DB::table('danh_mucs')->insert($data);
    // }
    
    protected $table = 'danh_mucs';
    protected $fillable = [
        'ten_danh_muc',
        'mo_ta'
    ];
    public function sanPhams(){
        return $this->hasMany(SanPham::class);
    }
}
