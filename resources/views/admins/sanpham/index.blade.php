@extends ('layouts.admin')


@section('css')
    <style>
        .vertical {
            vertical-align: middle;
        }

        .cnang {
            text-align: center;
        }
    </style>
@endsection

@section('title')
    {{-- Hiển thị dữ liệu trong blade --}}
    {{ $title }}
@endsection

@section('content')
    {{-- <a href="{{route('san_pham.create')}}" class="btn btn-success">Thêm Sản Phẩm</a> --}}
    <h1 class="h1 text-center mt-3 mb-3">{{ $title }}</h1>


    {{-- Hiển thị thông báo --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-3">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Giá khuyến mãi</th>
                    <th>Số lượng</th>
                    <th>Lượt xem</th>
                    <th>Ngày nhập</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th style="width: 1px;" class="text-nowrap">
                        <a style="width: 100%;" class="btn btn-success btn-sm" href="{{ route('san_pham.create') }}">Thêm</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listSanPham as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><img src="{{ Storage::url($item->hinh_anh) }}" alt="Hình ảnh sản phẩm" width="120px"></td>
                        <td class="vertical">{{ $item->ten_san_pham }}</td>
                        <td class="vertical">{{ $item->gia_san_pham }}</td>
                        <td class="vertical">{{ $item->gia_khuyen_mai }}</td>
                        <td class="vertical">{{ $item->so_luong }}</td>
                        <td class="vertical">{{ $item->luot_xem }}</td>
                        <td class="vertical">{{ $item->ngay_nhap }}</td>
                        <td class="vertical">{{ $item->mo_ta }}</td>
                        <td class="vertical">{{ $item->trang_thai == 0 ? 'Hết hàng' : 'Còn hàng' }}</td>
                        <td class="cnang" style="width: 1px;" class="text-nowrap">
                            <a class="btn btn-primary btn-sm" href="">Xem</a>
                            <a class="btn btn-warning" href="{{route('san_pham.edit', $item->id)}}">Sửa</a>
                            <form action="{{ route('san_pham.destroy', $item->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Bạn có đồng ý xóa không?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
