<?php

namespace App\Http\Controllers\Clients;

use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function san_pham_nam(){
        $title = "Giày Nam";
        $listSanPham = SanPham::where('danh_muc_id', 1)->get();
        return view('clients.nam', compact('title','listSanPham'));
    }
    public function san_pham_nu(){
        $title = "Giày Nữ";
        $listSanPham = SanPham::where('danh_muc_id', 2)->get();
        return view('clients.nu', compact('title','listSanPham'));
    }
    public function san_pham_tre_em(){
        $title = "Giày Trẻ em";
        $listSanPham = SanPham::where('danh_muc_id', 3)->get();
        return view('clients.tre_em', compact('title','listSanPham'));
    }
    public function san_pham_giam_gia(){
        $title = "Giày Giảm giá";
        $listSanPham = SanPham::where('danh_muc_id', 4)->get();
        return view('clients.giam_gia', compact('title','listSanPham'));
    }
    public function san_pham_chi_tiet(string $id){
        $title = "Chi tiết sản phẩm";
        $listSanPham = SanPham::where('danh_muc_id', 4)->get();
        $sanPham = SanPham::findOrFail($id);
        return view('clients.san_pham_chi_tiet', compact('title','listSanPham', 'sanPham'));
    }
}
