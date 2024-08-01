@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- Product Details -->
    <div class="container my-5">
        <div class="row g-0">
            <div class="col-lg-8">
                <!-- Image Grid -->
                <div class="row row-cols-2 g-2">
                    @foreach ($sanPham->hinh_anh_san_pham as $hinhAnh)
                        <div class="col">
                            <img src="{{ Storage::url($hinhAnh->link_hinh_anh) }}" class="img-fluid rounded-3" alt="Hình ảnh sản phẩm">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <h2 class="fw-bold mb-3">{{ $sanPham->ten_san_pham }}</h2>
                <div class="d-flex justify-content-between mb-3">
                    <h3 class="text-danger text-decoration-line-through">{{ $sanPham->gia_san_pham }} VNĐ</h3>
                    <h3 class="text-danger">{{ $sanPham->gia_khuyen_mai }} VNĐ</h3>
                </div>
                <p class="text-muted mb-3">{{ $sanPham->mo_ta }}</p>
                <h3 class="h6 mb-2">Trạng thái: {{ $sanPham->trang_thai == 0 ? 'Hết hàng' : 'Còn hàng' }}</h3>
                <h3 class="h6 mb-2">Số lượng còn: {{ $sanPham->so_luong }}</h3>
                <h3 class="h6 mb-3">Danh mục: 
                    {{ $sanPham->danh_muc_id == 1 ? 'Nam' : 
                       ($sanPham->danh_muc_id == 2 ? 'Nữ' : 
                       ($sanPham->danh_muc_id == 3 ? 'Trẻ em' : 'Giảm giá')) }}
                </h3>
                <form action="{{ route('gio_hang.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="so_luong" class="form-label">Số lượng</label>
                        <input type="number" id="so_luong" min="1" class="form-control @error('so_luong') is-invalid @enderror" name="so_luong" placeholder="Nhập số lượng mua">
                        @error('so_luong')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="hidden" name="san_pham_id" value="{{ $sanPham->id }}">
                    <button type="submit" class="btn btn-dark w-100 rounded-pill shadow-lg fw-bold py-2 px-4 d-flex align-items-center justify-content-center">
                        Thêm vào giỏ hàng 
                        <i class="fa-solid fa-cart-plus ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- New Products -->
    <div class="container my-5">
        <h1 class="fw-bold mb-4">New Products</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach ($listSanPham as $item)
                <div class="col">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ Storage::url($item->hinh_anh) }}" class="card-img-top img-fluid" alt="{{ $item->ten_san_pham }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->ten_san_pham }}</h5>
                            <p class="card-text text-danger">{{ $item->gia_san_pham }} VNĐ</p>
                            <a href="{{ route('san_pham_chi_tiet', $item->id) }}" class="btn btn-dark w-100">Find Out More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Comments -->
    <div class="container my-5">
        <h3 class="fw-bold mb-3">Comments</h3>
        <form action="{{ route('binh_luan.store') }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="san_pham_id" value="{{ $sanPham->id }}">
            <div class="mb-3">
                <label for="noi_dung" class="form-label">Nội dung:</label>
                <textarea name="noi_dung" id="noi_dung" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
        </form>
        @foreach ($sanPham->binhLuans as $binhLuan)
            <div class="mb-3 p-3 border rounded-3">
                <p>{{ $binhLuan->noi_dung }}</p>
                <small class="text-muted">Đăng bởi: {{ $binhLuan->taiKhoan->name }} vào {{ $binhLuan->thoi_gian }}</small>
            </div>
        @endforeach
    </div>
@endsection
