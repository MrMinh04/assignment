@extends('layouts.admin')

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
    Cập nhật đơn hàng
@endsection

@section('content')
    <h1 class="h1 text-center mt-3 mb-3">Cập nhật đơn hàng</h1>

    {{-- Hiển thị thông báo --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-3">
        <form action="{{ route('don_hang.update', $donHang->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="ma_don_hang" class="form-label">Mã đơn hàng</label>
                <input type="text" class="form-control" id="ma_don_hang" name="ma_don_hang" value="{{ $donHang->ma_don_hang }}" required>
            </div>

            <div class="mb-3">
                <label for="ten_nguoi_nhan" class="form-label">Tên người nhận</label>
                <input type="text" class="form-control" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="{{ $donHang->ten_nguoi_nhan }}" required>
            </div>

            <div class="mb-3">
                <label for="email_nguoi_nhan" class="form-label">Email người nhận</label>
                <input type="email" class="form-control" id="email_nguoi_nhan" name="email_nguoi_nhan" value="{{ $donHang->email_nguoi_nhan }}" required>
            </div>

            <div class="mb-3">
                <label for="sdt_nguoi_nhan" class="form-label">SĐT người nhận</label>
                <input type="text" class="form-control" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="{{ $donHang->sdt_nguoi_nhan }}" required>
            </div>

            <div class="mb-3">
                <label for="dia_chi_nguoi_nhan" class="form-label">Địa chỉ người nhận</label>
                <input type="text" class="form-control" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="{{ $donHang->dia_chi_nguoi_nhan }}" required>
            </div>

            <div class="mb-3">
                <label for="ngay_dat" class="form-label">Ngày đặt</label>
                <input type="date" class="form-control" id="ngay_dat" name="ngay_dat" value="{{ $donHang->ngay_dat }}" required>
            </div>

            <div class="mb-3">
                <label for="tong_tien" class="form-label">Tổng tiền</label>
                <input type="number" step="0.01" class="form-control" id="tong_tien" name="tong_tien" value="{{ $donHang->tong_tien }}" required>
            </div>

            <div class="mb-3">
                <label for="ghi_chu" class="form-label">Ghi chú</label>
                <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3">{{ $donHang->ghi_chu }}</textarea>
            </div>

            <div class="mb-3">
                <label for="phuong_thuc_thanh_toan_id" class="form-label">Phương thức thanh toán</label>
                <select class="form-control" id="phuong_thuc_thanh_toan_id" name="phuong_thuc_thanh_toan_id" required>
                    @foreach ($phuongThucThanhToans as $phuongThuc)
                        <option value="{{ $phuongThuc->id }}" {{ $phuongThuc->id == $donHang->phuong_thuc_thanh_toan_id ? 'selected' : '' }}>
                            {{ $phuongThuc->ten_phuong_thuc }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="trang_thai" class="form-label">Trạng thái</label>
                <select class="form-control" id="trang_thai" name="trang_thai" required>
                    <option value="0" {{ $donHang->trang_thai == 0 ? 'selected' : '' }}>Chưa xử lý</option>
                    <option value="1" {{ $donHang->trang_thai == 1 ? 'selected' : '' }}>Đã xử lý</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
        </form>
    </div>
@endsection
