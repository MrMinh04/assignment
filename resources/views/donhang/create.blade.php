@extends ('layouts.client')


@section('title')
    {{-- Hiển thị dữ liệu trong blade --}}
    {{ $title }}
@endsection

@section('css')
    <style>
        .tong {
            display: flex;
            width: 90%;
            margin-left: 5%;
        }

        .thongTin {
            font-family: Arial, sans-serif;
            width: 50%;
            margin: 0 auto;

            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }


        label {
            margin-bottom: 5px;
        }

        #name {
            width: 97%;
        }

        #sonha {
            width: 97%;
        }

        #email {
            width: 97%;
        }

        #sdt {
            width: 97%;
        }

        .thongTin input,
        select {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            width: 100%;
        }

        h2,
        h3 {
            margin-top: 15px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }


        input[type="checkbox"],
        input[type="radio"] {
            margin-right: 5px;
        }

        .sanpham {
            display: flex;
            /* justify-content: center; */
            align-items: top;
            margin-bottom: 10px;
        }

        .sanpham img {
            width: 200px;
            height: 200px;
        }

        .tt {
            margin-left: 20px;
        }

        .tt h3 {
            font-size: 20px;
            margin-bottom: 3px;
        }

        .tt h4 {
            font-size: 14px;
            margin-bottom: 3px;
        }

        .tt h5 {
            font-size: 12px;
            margin-bottom: 3px;
        }

        .ttHang h2 {
            font-size: 24px;
        }
    </style>
@endsection

@section('content')
    <div class="tong">
        <div class="thongTin">
            <div style="display: none">
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
                            <h4 style="border-bottom: 1px solid gray;">Thành tiền:
                                {{ $item->san_pham->gia_san_pham * $item->so_luong }} VND</h4>
                        </div>
                        <form style="margin: 10px" action="{{ route('gio_hang.destroy', $item->san_pham_id) }}"
                            method="POST" class="d-inline" onsubmit="return confirm('Bạn có đồng ý xóa không?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="nav-link"><i style="font-size: 26px"
                                    class="fa-solid fa-delete-left"></i></button>
                        </form>
                        @php
                            // Cập nhật tổng tiền cho mỗi sản phẩm
                            $total += $item->san_pham->gia_san_pham * $item->so_luong;
                        @endphp
                    </section>
                @endforeach

            </div>
            <h1 style="text-align: center; font-size: 24px;"> <strong>THÔNG TIN GIAO HÀNG</strong></h1><br>
            <form action="{{ route('don_hang.store') }}" method="post" class="form1">
                @csrf
                <label for="name">Họ và tên:</label>
                <input type="text" name="ten_nguoi_nhan" id="name" placeholder="Họ và tên người nhận" required>
                <br>
                <label for="sdt">Số điện thoại :</label>
                <input type="tel" name="sdt_nguoi_nhan" id="sdt" placeholder="Số điện thoại" required
                    pattern="\d{10}"><br>

                <label for="email">Email:</label>
                <input type="email" name="email_nguoi_nhan" id="email" placeholder="Email" required><br>

                <label for="address">Địa chỉ:</label>
                <input type="text" name="dia_chi_nguoi_nhan" id="email" placeholder="Địa chỉ" required><br>

                {{-- <label for="address">Ngày đặt:</label>
                <input type="date" name="ngay_dat" id="email" placeholder="Ngày đặt" required><br> --}}

                <label for="address">Ghi chú:</label>
                <input type="text" name="ghi_chu" id="email" placeholder="Ghi chú" required><br>

                <label for="">Phương thức thanh toán</label>
                <select name="phuong_thuc_thanh_toan_id">
                    <option value="" selected>Chọn danh mục</option>
                    @foreach ($pTTT as $item)
                        <option value="{{ $item->id }}">{{ $item->ten_phuong_thuc }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="tong_tien" value="{{ $total }}">
                <h6>Thông tin vận chuyển: MIỄN PHÍ</h6>
                <div class="d-flex">
                    <input type="checkbox" required>
                    <label for="agreement">Tôi đã đọc, hiểu và chấp thuận Chính sách và bảo mật và Các điều khoản và Điều
                        kiện
                    </label>
                </div>
                <br>
                <button type="submit">Thanh toán</button>

            </form>
        </div>
        <div class="ttHang">
            <div>
                <h2>SẢN PHẨM CỦA BẠN</h2>
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
                                <h4 style="border-bottom: 1px solid gray;">Thành tiền:
                                    {{ $item->san_pham->gia_san_pham * $item->so_luong }} VND</h4>
                            </div>
                            <form style="margin: 10px" action="{{ route('gio_hang.destroy', $item->san_pham_id) }}"
                                method="POST" class="d-inline" onsubmit="return confirm('Bạn có đồng ý xóa không?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="nav-link"><i style="font-size: 26px"
                                        class="fa-solid fa-delete-left"></i></button>
                            </form>
                            @php
                                // Cập nhật tổng tiền cho mỗi sản phẩm
                                $total += $item->san_pham->gia_san_pham * $item->so_luong;
                            @endphp
                        </section>
                    @endforeach

                </div>
            </div>
            <h2>Tổng tiền phải trả: {{ $total }} VND</h2>
        </div>
    </div>
@endsection
@section('js')
    <script>
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
    </script>
@endsection
