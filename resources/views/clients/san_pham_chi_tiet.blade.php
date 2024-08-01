@extends('layouts.client')

@section('title')
    {{-- Hiển thị dữ liệu trong blade --}}
    {{ $title }}
@endsection

@section('css')
    <style>
        .image-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 5px;
            max-width: 400px;
            /* hoặc bất kỳ kích thước tối đa nào bạn muốn */
        }

        .image-grid img {
            width: 100%;
            height: auto;
            object-fit: cover;
            aspect-ratio: 1/1;
            /* Đảm bảo hình ảnh vuông */
        }
    </style>
@endsection

@section('content')
    <div class="row g-0 justify-content-center">
        <div class="col-8">
            <div class="image-grid">
                @foreach ($sanPham->hinh_anh_san_pham as $hinhAnh)
                    <img style="height: 349.99px; width: 349.99px;" class="object-fit-cover"
                        src="{{ Storage::url($hinhAnh->link_hinh_anh) }}" alt="Hình ảnh sản phẩm">
                @endforeach
            </div>
        </div>
        <div class="col-3">
            <h2 class="fw-bold">{{ $sanPham->ten_san_pham }}</h2>
            <div class="" style="justify-content: space-between">
                <h3 class="text-danger h6 fw-bold text-decoration-line-through">{{ $sanPham->gia_san_pham }} VNĐ</h3>
                <h3 class="text-danger h4 fw-bold">{{ $sanPham->gia_khuyen_mai }} VNĐ</h3>
            </div>
            <p class="text-muted" style="font-style: italic; font-size: 15px;">
                {{ $sanPham->mo_ta }}
            </p>
            <h3 class="h6 fw-bold">Trạng thái: {{ $sanPham->trang_thai == 0 ? 'Hết hàng' : 'Còn hàng' }}</h3>
            <h3 class="h6 fw-bold">Số lượng còn: {{ $sanPham->so_luong }}</h3>
            <h3 class="h6 fw-bold">Danh mục:
                {{ $sanPham->danh_muc_id == 1
                    ? 'Nam'
                    : ($sanPham->danh_muc_id == 2
                        ? 'Nữ'
                        : ($sanPham->danh_muc_id == 3
                            ? 'Trẻ em'
                            : 'Giảm giá')) }}
            </h3>
            <form class="mt-4" action="{{ route('gio_hang.store') }}" method="post">
                @csrf
                <label class="form-label">Số lượng</label>
                <input type="number" style="width: 200px;" class="form-control @error('so_luong') is-invalid @enderror"
                    name="so_luong" placeholder="Nhập số lượng mua">
                @error('so_luong')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" name="san_pham_id" value="{{ $sanPham->id }}">
                <button class="btn btn-dark w-100 rounded-pill mt-4" style="height: 65px;" type="submit">Thêm vào giỏ hàng
                    <i class="fa-solid fa-cart-plus"></i></button>
            </form>
        </div>
    </div>
    
    <h1 class="fw-bold mt-3 d-flex align-items-center" style="height: 70px;">NEW PRODUCT</h1>
    <div class="row">
        @foreach ($listSanPham as $item)
            <div class="col-3 mb-5">
                <div class="border-black border-top border-bottom overflow-hidden mt-3 mb-3" style="height: 380px;">
                    <div style="height: 70px;">
                        <h1 style="margin: 0px;" class="h5 d-flex align-items-start mb-2 mt-2">{{ $item->ten_san_pham }}</h1>
                        <div style="height: 30px; font-size: 14px;" class="text-uppercase text-end text-danger-emphasis">
                            {{ $item->gia_san_pham }} VNĐ
                        </div>
                    </div>
                    <div class="bg-light d-flex align-items-center justify-content-center overflow-hidden mt-0">
                        <img src="{{ Storage::url($item->hinh_anh) }}" style="height:261px; width: 261px;"
                            class="object-fit-cover" alt="">
                    </div>
                </div>
                <div class="text-end">
                    <a class="w-100" href="{{ route('san_pham_chi_tiet', $item->id) }}">
                        <button class="btn btn-dark w-50 btn-sm rounded-0 " style="height: 30px;">FIND OUT MORE</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <form action="{{ route('binh_luan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="san_pham_id" value="{{ $sanPham->id }}">
        <div class="form-group">
            <label for="noi_dung">Nội dung:</label>
            <textarea name="noi_dung" id="noi_dung" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi bình luận</button>
    </form>

    <h3>Bình luận</h3>
    @foreach ($sanPham->binhLuans as $binhLuan)
        <p>{{ $binhLuan->noi_dung }}</p>
        <small>Đăng bởi: {{ $binhLuan->taiKhoan->name }} vào {{ $binhLuan->thoi_gian }}</small>
    @endforeach
@endsection
