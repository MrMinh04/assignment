@extends ('layouts.client')


@section('title')
    {{-- Hiển thị dữ liệu trong blade --}}
    {{ $title }}
@endsection

@section('content')
    <div class="row g-0 justify-content-center">
        <div class="col-8">
            <div class="mb-1">
                <img style="height: 349.99px; width: 349.99px;" class="object-fit-cover" src="{{asset('images/Air Force 1.png')}}" alt="">
                <img style="height: 349.99px; width: 349.99px;" class="object-fit-cover" src="{{asset('images/Air Force 1_2.png')}}" alt="">
            </div>
            <div class="mb-4">
                <img style="height: 349.99px; width: 349.99px;" class="object-fit-cover" src="{{asset('images/Air Force 1_3.png')}}" alt="">
                <img style="height: 349.99px; width: 349.99px;" class="object-fit-cover" src="{{asset('images/Air Force 1_4.png')}}" alt="">
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
            <div class="mt-4">
                <button class="btn btn-dark w-100 rounded-pill" style="height: 65px;" ng-click="onClickSubmit()">Add to Cart
                    <i class="fa-solid fa-cart-plus"></i></button>
            </div>
        </div>
    </div>
    <h1 class="fw-bold mt-3 d-flex align-items-center" style="height: 70px;">NEW PRODUCT</h1>
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
@endsection