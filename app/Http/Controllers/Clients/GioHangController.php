<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\ChiTietGioHang;
use App\Models\GioHang;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Giỏ hàng";
        $userId = auth()->user()->id;
        $gioHang = GioHang::with('chiTietGioHangs.san_pham')->where('tai_khoan_id', $userId)->first();
        if (!$gioHang) {
            return view('clients.gio_hang', ['sanPhamGioHang' => [], 'title' => $title]);
        }
        $sanPhamGioHang = $gioHang->chiTietGioHangs;
        // dd($sanPhamGioHang);
        session(['sanPhamGioHang' => $sanPhamGioHang]);
        return view('clients.gio_hang', compact('title', 'sanPhamGioHang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id; // Lấy ID người dùng hiện tại
        $san_pham_id = $request->input('san_pham_id');
        $so_luong = $request->input('so_luong');
        
        // Tìm giỏ hàng của người dùng hoặc tạo mới nếu không tồn tại
        $gioHang = GioHang::firstOrCreate(
            ['tai_khoan_id' => $userId],
            ['created_at' => now(), 'updated_at' => now()]
        );
    
        // Tìm chi tiết giỏ hàng của sản phẩm hiện tại
        $chiTietGioHang = ChiTietGioHang::where('gio_hang_id', $gioHang->id)
                                        ->where('san_pham_id', $san_pham_id)
                                        ->first();
    
        if ($chiTietGioHang) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $chiTietGioHang->so_luong += $so_luong;
            $chiTietGioHang->save();
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, tạo mới
            ChiTietGioHang::create([
                'gio_hang_id' => $gioHang->id,
                'san_pham_id' => $san_pham_id,
                'so_luong' => $so_luong,
            ]);
        }
    
        return redirect()->route('gio_hang.index')->with('success', 'Cập nhật giỏ hàng thành công!');
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
    public function destroy(Request $request, string $id)
    {
        if ($request->isMethod('DELETE')) {
            $userId = auth()->user()->id;
            $gioHang = GioHang::where('tai_khoan_id', $userId)->first();
            if (!$gioHang) {
                return redirect()->route('gio_hang.index')->with('error', 'Giỏ hàng không tồn tại.');
            }
            $chiTietGioHang = ChiTietGioHang::where('gio_hang_id', $gioHang->id)
                                            ->where('san_pham_id', $id)
                                            ->first();
            if ($chiTietGioHang) {
                $chiTietGioHang->delete();
            }

            return redirect()->route('gio_hang.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
        }
    }
    
}
