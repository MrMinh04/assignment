<?php

namespace App\Http\Controllers\Admins;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\HinhAnhSanPham;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    public $san_phams;
    public function __construct()
    {
        $this->san_phams = new SanPham();
    }
    public function index()
    {
        $title = "Danh sách sản phẩm";
        $listSanPham = SanPham::get();
        return view('admins.sanpham.index', compact('title', 'listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listDanhMuc = DanhMuc::get();
        $title = "Thêm sản phẩm";
        return view('admins.sanpham.create', compact('title', 'listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('hinh_anh')) {
                $filename = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
            } else {
                $filename = null;
            };
            $params['hinh_anh'] = $filename;
            $sanPham = SanPham::query()->create($params);

            $sanPhamId = $sanPham->id;

            if ($request->hasFile('list_hinh_anh')) {
                foreach ($request->file('list_hinh_anh') as $image) {
                    if ($image) {
                        $path = $image->store('uploads/hinhanhsanpham/id_' . $sanPhamId, 'public');
                        $sanPham->hinhAnhSanPham()->create(
                            [
                                'san_pham_id' => $sanPhamId,
                                'link_hinh_anh' => $path
                            ]
                        );
                    }
                }
            }
            return redirect()->route('san_pham.index')->with('success', 'Thêm sản phầm thành công!');
        }
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
        $title = "Sửa sản phẩm";
        $listDanhMuc = DanhMuc::get();
        $sanPham = SanPham::findOrFail($id);
        return view('admins.sanpham.update', compact('title', 'sanPham', 'listDanhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');
            $sanPham = SanPham::findOrFail($id);
            if ($request->hasFile('hinh_anh')) {
                if ($sanPham->hinh_anh) {
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
            } else {
                $params['hinh_anh'] = $sanPham->hinh_anh;
            }
            $sanPham->update($params);

            //Sử lý album
            $currentImages = $sanPham->hinhAnhSanPham()->pluck('id')->toArray();
            $arrayCombine = array_combine($currentImages, $currentImages);
            //Trường hợp xoá ảnh
            foreach ($arrayCombine as $key => $value) {
                if (!array_key_exists($key, $request->list_hinh_anh)) {
                    $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                    if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->link_hinh_anh)) {
                        Storage::disk('public')->delete($hinhAnhSanPham->link_hinh_anh);
                        $hinhAnhSanPham->delete();
                    }
                }
            }
            //Trường hợp thêm hoặc sửa ảnh
            foreach ($request->list_hinh_anh as $key => $image) {
                if (!array_key_exists($key, $arrayCombine)) {
                    if ($request->hasFile("list_hinh_anh.$key")) {
                        $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');
                        $sanPham->hinhAnhSanPham()->create([
                            'san_pham_id' => $id,
                            'link_hinh_anh' => $path
                        ]);
                    }
                } else if (is_file($image) && $request->hasFile("list_hinh_anh.$key")) {
                    //Trường hợp thay đổi hình ảnh
                    $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                    if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->link_hinh_anh)) {
                        Storage::disk('public')->delete($hinhAnhSanPham->link_hinh_anh);
                        // $hinhAnhSanPham->delete();
                    }
                    $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');
                    $hinhAnhSanPham->update([
                        'link_hinh_anh' => $path,
                    ]);
                }
            }
            $sanPham->update($params);
            return redirect()->route('san_pham.index');
        }
    }

    //     public function update(Request $request, string $id)
    // {
    //     if ($request->isMethod('PUT')) {
    //         $params = $request->except('_token', '_method');
    //         $sanPham = SanPham::findOrFail($id);

    //         // Xử lý ảnh chính
    //         if ($request->hasFile('hinh_anh')) {
    //             if ($sanPham->hinh_anh) {
    //                 Storage::disk('public')->delete($sanPham->hinh_anh);
    //             }
    //             $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
    //         } else {
    //             $params['hinh_anh'] = $sanPham->hinh_anh;
    //         }

    //         // Cập nhật thông tin sản phẩm
    //         $sanPham->update($params);

    //         // Xử lý album ảnh
    //         $currentImages = $sanPham->hinhAnhSanPham()->pluck('id')->toArray();
    //         $newImages = $request->list_hinh_anh ?? [];

    //         // Xóa ảnh cũ
    //         foreach ($currentImages as $imageId) {
    //             if (!array_key_exists($imageId, $newImages)) {
    //                 $hinhAnhSanPham = HinhAnhSanPham::find($imageId);
    //                 if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->link_hinh_anh)) {
    //                     Storage::disk('public')->delete($hinhAnhSanPham->link_hinh_anh);
    //                     $hinhAnhSanPham->delete();
    //                 }
    //             }
    //         }

    //         // Thêm mới hoặc cập nhật ảnh
    //         foreach ($newImages as $key => $image) {
    //             if ($request->hasFile("list_hinh_anh.$key")) {
    //                 $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');

    //                 // Nếu ảnh đã tồn tại, cập nhật
    //                 $hinhAnhSanPham = HinhAnhSanPham::find($key);
    //                 if ($hinhAnhSanPham) {
    //                     Storage::disk('public')->delete($hinhAnhSanPham->link_hinh_anh);
    //                     $hinhAnhSanPham->update(['link_hinh_anh' => $path]);
    //                 } else {
    //                     // Nếu ảnh mới, tạo mới
    //                     $sanPham->hinhAnhSanPham()->create([
    //                         'san_pham_id' => $id,
    //                         'link_hinh_anh' => $path,
    //                     ]);
    //                 }
    //             }
    //         }

    //         return redirect()->route('san_pham.index');
    //     }
    // }






    public function destroy(Request $request, string $id)
    {
        if ($request->isMethod('DELETE')) {

            $sanPham = SanPham::query()->findOrFail($id);

            $sanPham->delete();

            if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
                Storage::disk('public')->delete($sanPham->hinh_anh);
            }

            $sanPham->hinhAnhSanPham()->delete();
            $path = 'uploads/hinhanhsanpham/id_' . $id;
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->deleteDirectory($path);
            }

            return redirect()->route('san_pham.index')->with('success', 'Xóa sản phầm thành công!');
        }
    }
}
