@extends ('layouts.client')


@section('title')
    {{-- Hiển thị dữ liệu trong blade --}}
    {{ $title }}
@endsection

@section('css')
    <style>
        .boxto {
            display: flex;
            width: 95%;
            margin-left: 5%;
            justify-content: space-between;
            margin-top: 10px;
        }

        .boxto_rong {
            width: 90%;
            margin-left: 5%;
            margin-top: 10px;
        }

        .boxtrai {
            margin-top: 5px;
        }

        .boxphai {
            border-left: 3px solid black;
            border-top: 3px solid black;
            border-bottom: 3px solid black;
            border-top-left-radius: 40px;
            border-bottom-left-radius: 40px;
            padding-left: 3%;
            /* padding-top: 30px; */
            padding-bottom: 30px;
            height: auto;
            width: 34%;
        }

        .sanpham {
            display: flex;
            /* justify-content: center; */
            align-items: flex-start;
        }

        .sanpham img {
            width: 300px;
            height: 300px;
        }

        .tt {
            margin-left: 30px;
        }

        .tt h3 {
            font-size: 25px;
        }

        .tt h4 {
            font-size: 20px;
        }

        .tt h5 {
            font-size: 15px;
        }

        .boxto h2 {
            font-size: 30px;
        }

        /* h2, h3, h4, h5, h6{
        font-weight: 500;
    } */
        .checkout {
            color: white;
            border: 1px solid black;
            background-color: black;
            border-radius: 40px;
            margin-bottom: 10px;
            /* padding: 10px 40px; */
            margin-top: 15px;
            height: 60px;
            width: 94%;
            font-weight: 600;
            font-size: 18px;
        }
    </style>
@endsection

@section('content')
    <div class="boxto">
        <div class="boxtrai">
            <h2 style="margin-bottom: 10px;" class="fw-bold">GIỎ HÀNG CỦA BẠN</h2>
            @if(count($sanPhamGioHang) > 0)
            <div>
                @php
                    $total = 0;
                @endphp
                @foreach ($sanPhamGioHang as $item)
                <section class="sanpham" style="margin-bottom: 10px">
                    <div>
                        <img src="{{ Storage::url($item->san_pham->hinh_anh) }}" alt="">
                    </div>
                    <div class="tt">
                        <h3>{{ $item->san_pham->ten_san_pham }}</h3><br>
                        <h4>{{ number_format($item->san_pham->gia_san_pham) }} VND</h4><br>
                        <h5>Số lượng: {{ $item->so_luong }}</h5><br>
                        <h4 style="border-bottom: 1px solid gray;">Thành tiền: {{ $item->san_pham->gia_san_pham * $item->so_luong }} VND</h4>
                    </div>
                    <form style="margin: 10px" action="{{ route('gio_hang.destroy', $item->san_pham_id) }}" method="POST"
                        class="d-inline" onsubmit="return confirm('Bạn có đồng ý xóa không?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form>  
                    @php
                        // Cập nhật tổng tiền cho mỗi sản phẩm
                        $total += $item->san_pham->gia_san_pham * $item->so_luong;
                    @endphp                
                </section>
                @endforeach
                
            </div>
            @else
                <div style="">
                    <img width="600px" src="{{asset('images/cart_rong.png')}}" alt="">
                </div>
                @php
                    $total = 0;
                @endphp
            @endif
        </div>
        <div class="boxphai">
            <center>
                <h2 class="fw-bold" style="margin-top: 10px;">SUMMARY</h2>
            </center><br>
            <h3>Tóm tắt đơn hàng</h3><br>
            <h4>Thành tiền sản phẩm: <b>{{ number_format($total) }} VND</b></h4><br>
            <h4>Phí vận chuyển: <b>MIỄN PHÍ</b></h4><br>
            <h4>Tổng cộng: <b>{{ number_format($total) }} VND</b></h4><br>
            <a href="#"><button class="checkout">Guest Checkout <i class='bx bxs-cart'></i></button></a>
        </div>
    </div>
@endsection
@section('js')
    {{-- <script>
        function showImage(event) {
            const image_san_pham = document.getElementById('image_san_pham');
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function() {
                image_san_pham.src = reader.result;
                image_san_pham.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script> --}}
    <script>
        function xoaSanPham(item) {
            var row = item.closest('section');
            row.remove();
        }
    </script>
@endsection
