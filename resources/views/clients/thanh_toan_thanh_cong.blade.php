@extends ('layouts.client')


@section('title')
    {{-- Hiển thị dữ liệu trong blade --}}
    {{-- {{ $title }} --}}
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
            width: 240px;
            height: 240px;
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
    <center>
        <h1 style="padding: 200px 400px">CHÚC MỪNG BẠN ĐÃ ĐẶT HÀNG THÀNH CÔNG</h1>
        <a href="">Đơn hàng của bạn</a>
    </center>
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
