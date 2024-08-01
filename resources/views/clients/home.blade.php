@extends ('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- Carousel -->
    <div id="demo" class="carousel slide overflow-hidden" data-bs-ride="carousel" style="height: 480px;">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner10.png') }}" class="d-block w-100 h-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner8.png') }}" class="d-block w-100 h-100" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner11.png') }}" class="d-block w-100 h-100" alt="Banner 3">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- New Products Section -->
    <div class="container my-5">
        <h1 class="text-center fw-bold mb-4">New Products</h1>
        <div class="row">
            @foreach ($listSanPham as $item)
                <div class="col-md-4 col-lg-3 mb-4">
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

    <!-- Don't Miss Section -->
    <div class="container my-5">
        <h1 class="text-center fw-bold mb-4">Don't Miss</h1>
        <section class="banner_video">
            <video class="w-100 rounded-3 shadow-sm" controls autoplay loop src="{{ asset('images/b.mp4') }}"></video>
        </section>
    </div>

    <!-- What's Hot Section -->
    <div class="container my-5">
        <h1 class="text-center fw-bold mb-4">What's Hot</h1>
        <div class="row">
            @foreach ($listSanPham as $item)
                <div class="col-md-4 col-lg-3 mb-4">
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

    <!-- Who Are You Shopping For Section -->
    <div class="container my-5">
        <h1 class="text-center fw-bold mb-4">Who Are You Shopping For?</h1>
        <section class="d-flex justify-content-between">
            <div class="position-relative">
                <img src="{{ asset('images/Rectangle 8.png') }}" class="img-fluid rounded-3" style="height: 358px;" alt="Women's">
                <a href="{{ route('nu') }}" class="position-absolute top-50 start-50 translate-middle">
                    <button class="btn btn-light fw-bold">Women's</button>
                </a>
            </div>
            <div class="position-relative">
                <img src="{{ asset('images/Rectangle 9.png') }}" class="img-fluid rounded-3" style="height: 358px;" alt="Men's">
                <a href="{{ route('nam') }}" class="position-absolute top-50 start-50 translate-middle">
                    <button class="btn btn-light fw-bold">Men's</button>
                </a>
            </div>
            <div class="position-relative">
                <img src="{{ asset('images/Rectangle 10.png') }}" class="img-fluid rounded-3" style="height: 358px;" alt="Kid's">
                <a href="{{ route('tre_em') }}" class="position-absolute top-50 start-50 translate-middle">
                    <button class="btn btn-light fw-bold">Kid's</button>
                </a>
            </div>
        </section>
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
