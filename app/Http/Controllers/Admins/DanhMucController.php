<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public $danh_mucs;
    public function __construct()
    {
        $this->danh_mucs = new DanhMuc();
    }
    public function index()
    {
        $listDanhMuc = DanhMuc::get();
        $title = "Danh sách danh mục";
        return view('admins/danhmuc/index', compact('listDanhMuc','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm danh mục";
        return view('admins.danhmuc.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            
            DanhMuc::create($params);
            return redirect()->route('danh_muc.index')->with('success', 'Thêm danh mục thành công');
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
        $title = "Sửa danh mục";
        $danhMuc = DanhMuc::findOrFail($id);
        return view('admins.danhmuc.update', compact('title', 'danhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $params = $request->except('_token', '_method');
            $sanPham = DanhMuc::findOrFail($id);
            $sanPham->update($params);
        }
        return redirect()->route('danh_muc.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->isMethod('DELETE')) {
    
            $danhMuc = DanhMuc::query()->findOrFail($id);

            $danhMuc->delete();

            return redirect()->route('danh_muc.index')->with('success', 'Xóa sản phầm thành công!');
        }
    }
}
