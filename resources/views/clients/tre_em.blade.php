@extends ('layouts.client')


@section('title')
    {{-- Hiển thị dữ liệu trong blade --}}
    {{ $title }}
@endsection

@section('content')
    {{-- <h6>{{ userId }}</h6> --}}
    <!-- Carousel -->
    <div id="demo" class="carousel slide overflow-hidden" data-bs-ride="carousel" style="height: 480px;">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner_kid4.jpg') }}" alt="Los Angeles" class="d-block w-100 h-100">
            </div>
            <div class="carousel-item">
                <img style="height: 100%;" src="{{ asset('images/banner_kid2.jpg') }}" alt="Chicago"
                    class="d-block w-100 h-100">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner_kid3.jpg') }}" alt="New York" class="d-block w-100 h-100">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <h1 class="fw-bold mt-3 d-flex align-items-center" style="height: 70px;">NEW PRODUCT</h1>
    <!-- Sản phẩm -->
    <div class="row">
        @foreach ($listSanPham as $item)
            <div class="col-3 mb-5">
                <div class="border-black border-top border-bottom overflow-hidden mt-3 mb-3" style="height: 380px;">
                    <div style="height: 70px;">
                        <h1 style="margin: 0px;" class="h5 d-flex align-items-start mb-2 mt-2">{{ $item->ten_san_pham }}
                        </h1>
                        <div style="height: 30px; font-size: 14px;" class="text-uppercase text-end text-danger-emphasis">
                            {{ $item->gia_san_pham }} VNĐ</div>
                    </div>
                    <div class="bg-light d-flex align-items-center justify-content-center overflow-hidden mt-0">
                        <img src="{{ Storage::url($item->hinh_anh) }}" style="height:261px; width: 261px;"
                            class="object-fit-cover" alt="">
                    </div>
                </div>
                <div class="text-end">
                    <a class="w-100" href="{{route('san_pham_chi_tiet', $item->id)}}">
                        <button class="btn btn-dark w-50 btn-sm rounded-0 " style="height: 30px;">FIND OUT MORE</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <h1 class="fw-bold mt-3 d-flex align-items-center" style="height: 70px;">DON'T MISS</h1>
    <section class="banner_video container mt-4">
        <video style="width: 100%;" controls autoplay loop src={{ asset('images/b.mp4') }}></video>
    </section>
    <h1 class="fw-bold mt-3 d-flex align-items-center" style="height: 70px;">WHAT'S HOT</h1>
    <div class="row">
        @foreach ($listSanPham as $item)
            <div class="col-3 mb-5">
                <div class="border-black border-top border-bottom overflow-hidden mt-3 mb-3" style="height: 380px;">
                    <div style="height: 70px;">
                        <h1 style="margin: 0px;" class="h5 d-flex align-items-start mb-2 mt-2">{{ $item->ten_san_pham }}
                        </h1>
                        <div style="height: 30px; font-size: 14px;" class="text-uppercase text-end text-danger-emphasis">
                            {{ $item->gia_san_pham }} VNĐ</div>
                    </div>
                    <div class="bg-light d-flex align-items-center justify-content-center overflow-hidden mt-0">
                        <img src="{{ Storage::url($item->hinh_anh) }}" style="height:261px; width: 261px;"
                            class="object-fit-cover" alt="">
                    </div>
                </div>
                <div class="text-end">
                    <a class="w-100" href="{{route('san_pham_chi_tiet', $item->id)}}">
                        <button class="btn btn-dark w-50 btn-sm rounded-0 " style="height: 30px;">FIND OUT MORE</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <hr class="hr">
    <h1 class="fw-bold mt-3 d-flex align-items-center" style="height: 70px;">WHO ARE YOU SHOPPING FOR?</h1>
    <section class="d-flex justify-content-between mb-5">
        <div class="position-relative">
            <img style="height: 358px;" src="{{ asset('images/Rectangle 8.png') }}" alt="">
            <a href=""><button style="top: 77%; left: 10%; font-size: 14px; width: 120px; height: 40px;"
                    class="position-absolute boder rounded-pill fw-bolder">Women's</button></a>
        </div>
        <div class="position-relative">
            <img style="height: 358px;" src="{{ asset('images/Rectangle 9.png') }}" alt="">
            <a href=""><button style="top: 77%; left: 10%; font-size: 14px; width: 120px; height: 40px;"
                    class="position-absolute boder rounded-pill fw-bolder">Men's</button></a>
        </div>
        <div class="position-relative">
            <img style="height: 358px;" src="{{ asset('images/Rectangle 10.png') }}" alt="">
            <a href=""><button
                    style="top: 77%; left: 10%; font-size: 14px; width: 120px; height: 40px;"
                    class="position-absolute boder rounded-pill fw-bolder">Kid's</button></a>
        </div>
    </section>
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
