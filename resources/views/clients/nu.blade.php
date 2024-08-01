@extends ('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel" style="height: 480px;">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner_women5.jpg') }}" class="d-block w-100 h-100" alt="Los Angeles">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner_women.jpg') }}" class="d-block w-100 h-100" alt="Chicago">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner_women3.jpg') }}" class="d-block w-100 h-100" alt="New York">
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

    <div class="container mt-5">
        <h1 class="fw-bold mb-4">NEW PRODUCT</h1>
        <div class="row">
            @foreach ($listSanPham as $item)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 border-0">
                        <img src="{{ Storage::url($item->hinh_anh) }}" class="card-img-top" alt="{{ $item->ten_san_pham }}" style="object-fit: cover; height: 261px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->ten_san_pham }}</h5>
                            <p class="card-text text-danger">{{ number_format($item->gia_san_pham) }} VNĐ</p>
                            <a href="{{ route('san_pham_chi_tiet', $item->id) }}" class="btn btn-dark mt-auto">FIND OUT MORE</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h1 class="fw-bold mt-5 mb-4">DON'T MISS</h1>
        <section class="banner_video mb-5">
            <video class="w-100" controls autoplay loop>
                <source src="{{ asset('images/b.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </section>

        <h1 class="fw-bold mt-5 mb-4">WHAT'S HOT</h1>
        <div class="row">
            @foreach ($listSanPham as $item)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 border-0">
                        <img src="{{ Storage::url($item->hinh_anh) }}" class="card-img-top" alt="{{ $item->ten_san_pham }}" style="object-fit: cover; height: 261px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->ten_san_pham }}</h5>
                            <p class="card-text text-danger">{{ number_format($item->gia_san_pham) }} VNĐ</p>
                            <a href="{{ route('san_pham_chi_tiet', $item->id) }}" class="btn btn-dark mt-auto">FIND OUT MORE</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h1 class="fw-bold mt-5 mb-4">WHO ARE YOU SHOPPING FOR?</h1>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="position-relative">
                    <img src="{{ asset('images/Rectangle 8.png') }}" class="w-100" style="height: 358px;" alt="Women's">
                    <a href="{{ route('nu') }}" class="position-absolute top-50 start-50 translate-middle">
                        <button class="btn btn-dark rounded-pill">Women's</button>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="position-relative">
                    <img src="{{ asset('images/Rectangle 9.png') }}" class="w-100" style="height: 358px;" alt="Men's">
                    <a href="{{ route('nam') }}" class="position-absolute top-50 start-50 translate-middle">
                        <button class="btn btn-dark rounded-pill">Men's</button>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="position-relative">
                    <img src="{{ asset('images/Rectangle 10.png') }}" class="w-100" style="height: 358px;" alt="Kid's">
                    <a href="{{ route('tre_em') }}" class="position-absolute top-50 start-50 translate-middle">
                        <button class="btn btn-dark rounded-pill">Kid's</button>
                    </a>
                </div>
            </div>
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
