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
                    <th class="vertical">Stt</th>
                    <th class="vertical">Mã đơn hàng</th>
                    <th class="vertical">Tên người nhận</th>
                    <th class="vertical">Email người nhận</th>
                    <th class="vertical">SĐT người nhận</th>
                    <th class="vertical">Địa chỉ người nhận</th>
                    <th class="vertical">Ngày đặt</th>
                    <th class="vertical">Tổng tiền</th>
                    <th class="vertical">Ghi chú</th>
                    <th class="vertical">Phương thức thanh toán</th>
                    <th class="vertical">Trạng thái</th>
                    <th style="width: 1px;" class="text-nowrap vertical">
                        <a style="width: 100%;" class="btn btn-success btn-sm" href="{{ route('don_hang.create') }}">Thêm</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listDonHang as $index => $donHang)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="vertical">{{ $donHang->ma_don_hang }}</td>
                        <td class="vertical">{{ $donHang->ten_nguoi_nhan }}</td>
                        <td class="vertical">{{ $donHang->email_nguoi_nhan }}</td>
                        <td class="vertical">{{ $donHang->sdt_nguoi_nhan }}</td>
                        <td class="vertical">{{ $donHang->dia_chi_nguoi_nhan }}</td>
                        <td class="vertical">{{ $donHang->ngay_dat }}</td>
                        <td class="vertical">{{ number_format($donHang->tong_tien, 2) }}</td>
                        <td class="vertical">{{ $donHang->ghi_chu }}</td>
                        <td class="vertical">{{ $donHang->phuongThucThanhToan->ten_phuong_thuc }}</td>
                        <td class="vertical">{{ $donHang->trang_thai == 0 ? 'Chưa xử lý' : 'Đã xử lý' }}</td>
                        <td class="cnang" style="width: 1px;" class="text-nowrap">
                            <a class="btn btn-warning btn-sm" style="margin: 10px; margin-top: 20px;" href="{{route('don_hang.edit', $donHang->id)}}">Sửa</a>
                            <form style="margin: 10px" action="{{ route('don_hang.destroy', $donHang->id) }}" method="POST"
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
