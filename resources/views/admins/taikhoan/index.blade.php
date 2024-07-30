@extends ('layouts.admin')


@section('css')
@endsection

@section('title')
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
                    <th>Stt</th>
                    <th>Họ và tên</th>
                    <th>Ảnh đại diện</th>
                    <th>Ngày sinh</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Mật khẩu</th>
                    <th>Chức vụ</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listTaiKhoan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->anh_dai_dien }}</td>
                        <td>{{ $item->ngay_sinh }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->so_dien_thoai }}</td>
                        <td>{{ $item->dia_chi }}</td>
                        <td>*******</td>
                        <td>{{ $item->role == 1 ? 'Admin' : 'Khách hàng' }}</td>
                        <td>{{ $item->trang_thai == 0 ? 'Hoạt động' : 'Tạm ngừng' }}</td>
                        <td style="width: 1px;" class="text-nowrap">
                            <a class="btn btn-warning btn-sm" href="{{route('tai_khoan.edit', $item->id)}}">Sửa</a>
                            <form action="{{ route('tai_khoan.destroy', $item->id) }}" method="POST"
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
