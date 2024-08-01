@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-4">GIỎ HÀNG CỦA BẠN</h2>
                @if(count($sanPhamGioHang) > 0)
                    @php $total = 0; @endphp
                    @foreach ($sanPhamGioHang as $item)
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ Storage::url($item->san_pham->hinh_anh) }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->san_pham->ten_san_pham }}</h5>
                                        <p class="card-text">Giá: {{ number_format($item->san_pham->gia_san_pham) }} VND</p>
                                        <p class="card-text">Số lượng: {{ $item->so_luong }}</p>
                                        <p class="card-text">Thành tiền: {{ number_format($item->san_pham->gia_san_pham * $item->so_luong) }} VND</p>
                                        <form action="{{ route('gio_hang.destroy', $item->san_pham_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có đồng ý xóa không?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $total += $item->san_pham->gia_san_pham * $item->so_luong; @endphp
                    @endforeach
                @else
                    <div class="text-center">
                        <img src="{{ asset('images/cart_rong.png') }}" class="img-fluid" alt="Giỏ hàng trống">
                    </div>
                    @php $total = 0; @endphp
                @endif
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center fw-bold">TÓM TẮT ĐƠN HÀNG</h3>
                        <p class="card-text">Thành tiền sản phẩm: <strong>{{ number_format($total) }} VND</strong></p>
                        <p class="card-text">Phí vận chuyển: <strong>MIỄN PHÍ</strong></p>
                        <p class="card-text">Tổng cộng: <strong>{{ number_format($total) }} VND</strong></p>
                        <a href="{{ route('don_hang.create') }}" class="btn btn-dark btn-lg w-100 mt-3">Thanh toán <i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function xoaSanPham(item) {
            var row = item.closest('.card');
            row.remove();
        }
    </script>
@endsection
