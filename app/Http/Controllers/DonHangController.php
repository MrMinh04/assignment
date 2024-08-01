<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\PhuongThucThanhToan;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sanPhamGioHang = session('sanPhamGioHang');
        // dd($sanPhamGioHang);
        $title = "Thêm đơn hàng";

        $pTTT = PhuongThucThanhToan::get();
        return view('donhang.create', compact('title', 'sanPhamGioHang', 'pTTT'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $userId = auth()->user()->id;
            $params = $request->except('_token');
            $sanPhamGioHang = session('sanPhamGioHang');
            // dd($sanPhamGioHang);
            // DonHang::query()->create($params);

            $donHang = DonHang::create([
                'tai_khoan_id' => $userId,
                'ten_nguoi_nhan' => $params['ten_nguoi_nhan'],
                'email_nguoi_nhan' => $params['email_nguoi_nhan'],
                'sdt_nguoi_nhan' => $params['sdt_nguoi_nhan'],
                'dia_chi_nguoi_nhan' => $params['dia_chi_nguoi_nhan'],
                'ngay_dat' => now(),
                'tong_tien' => $params['tong_tien'],
                'ghi_chu' => $params['ghi_chu'],
                'phuong_thuc_thanh_toan_id' => $params['phuong_thuc_thanh_toan_id'],
            ]);


            // ChiTietDonHang::create([
            //     'don_hang_id' => $donHang->id,
            //     'san_pham_id' =>,
            //     'don_gia' =>,
            //     'so_luong' =>,
            //     'thanh_tien' =>
            // ]);


            foreach ($sanPhamGioHang as $sanPham) {
                ChiTietDonHang::create([
                    'don_hang_id' => $donHang->id,
                    'san_pham_id' => $sanPham->san_pham_id, // ID sản phẩm từ giỏ hàng
                    'don_gia' => $sanPham->san_pham->gia_san_pham, // Đơn giá từ giỏ hàng
                    'so_luong' => $sanPham->so_luong, // Số lượng từ giỏ hàng
                    'thanh_tien' => $sanPham->so_luong * $sanPham->san_pham->gia_san_pham, // Thành tiền tính từ đơn giá và số lượng
                ]);
            }
    

        }
        return view('clients.thanh_toan_thanh_cong')->with('success', 'Thêm sản phẩm vào giỏ hàng thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
