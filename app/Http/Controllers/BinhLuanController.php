<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuan;
use Auth;

class BinhLuanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'san_pham_id' => 'required|exists:san_phams,id',
            'noi_dung' => 'required|string|max:1000',
        ]);

        BinhLuan::create([
            'tai_khoan_id' => auth()->id(),
            'san_pham_id' => $request->san_pham_id,
            'noi_dung' => $request->noi_dung,
        ]);

        return back()->with('success', 'Bình luận đã được thêm thành công!');
    }

}
