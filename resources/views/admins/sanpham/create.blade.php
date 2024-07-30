@extends ('layouts.admin')


@section('title')
    {{-- Hiển thị dữ liệu trong blade --}}
    {{ $title }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h1 text-center mt-3 mb-3"><?= $title ?></h1>
            <form action="{{ route('san_pham.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="d-flex justify-content-between container">
                    <div style="width: 60%;">
                        <div class="mb-3">
                            <label for="" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control @error('ten_san_pham') is-invalid @enderror"
                                name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                            @error('ten_san_pham')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control @error('hinh_anh') is-invalid @enderror"
                                name="hinh_anh" onchange="showImage(event)">
                            @error('hinh_anh')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <img src="" id="image_san_pham" alt="Hình ảnh sản phẩm" width="200px"
                            style="display: none">
                        <div class="mb-3">
                            <label for="" class="form-label">Giá sản phẩm</label>
                            <input type="number" class="form-control @error('gia_san_pham') is-invalid @enderror"
                                name="gia_san_pham" min="1" placeholder="Nhập giá sản phẩm">
                            @error('gia_san_pham')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Giá khuyến mại</label>
                            <input type="number" class="form-control @error('gia_khuyen_mai') is-invalid @enderror"
                                name="gia_khuyen_mai" min="1" placeholder="Nhập giá khuyến mại">
                            @error('gia_khuyen_mai')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Số lượng</label>
                            <input type="number" class="form-control @error('so_luong') is-invalid @enderror"
                                name="so_luong" min="0" placeholder="Nhập số lượng sản phẩm">
                            @error('so_luong')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Lượt xem</label>
                            <input type="number" class="form-control @error('luot_xem') is-invalid @enderror"
                                name="luot_xem" min="1" placeholder="Nhập lượt xem">
                            @error('luot_xem')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Ngày nhập</label>
                            <input type="date" class="form-control @error('ngay_nhap') is-invalid @enderror"
                                name="ngay_nhap">
                            @error('ngay_nhap')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Mô tả</label>
                            <textarea name="mo_ta" cols="30" rows="3" class="form-control @error('mo_ta') is-invalid @enderror"></textarea>
                            @error('mo_ta')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Danh mục</label>
                            <select name="danh_muc_id" class="@error('danh_muc_id') is-invalid @enderror">
                                <option selected>Chọn danh mục</option>
                                @foreach ($listDanhMuc as $item)
                                    <option value="{{ $item->id }}">{{ $item->ten_danh_muc }}</option>
                                @endforeach

                            </select>
                            @error('danh_muc_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Trạng thái</label>
                            <select name="trang_thai" class="@error('trang_thai') is-invalid @enderror">
                                <option selected>Trạng thái của sản phẩm</option>
                                <option value="0">Hết hàng</option>
                                <option value="1">Còn hàng</option>
                            </select>
                            @error('trang_thai')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="" class="form-label">Album hình ảnh</label>
                        <i id="add-row" class="fa-solid fa-plus ms-3" style="cursor: pointer;"></i>
                        <table class="table align-middle table-nowrap mb-0">
                            <tbody id="image-table-id">
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <img class="pe-3"
                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0Wr3oWsq6KobkPqznhl09Wum9ujEihaUT4Q&s"
                                            id="preview_0" alt="Hình ảnh sản phẩm" width="100px">
                                        <input type="file" class="form-control" name="list_hinh_anh[id_0]"
                                            onchange="previewImage(this, 0)">

                                    </td>
                                    {{-- <td>
                                        <i class="fa-solid fa-trash" style="cursor: pointer;"
                                            onclick="removeRow(this)"></i>
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mb-3 d-flex justify-content-center">
                    <button type="reset" class="btn btn-outline-secondary me-3">Nhập lại</button>
                    <button type="submit" class="btn btn-success">Thêm mới</button>
                </div>
            </form>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rowCount = 1;

            document.getElementById('add-row').addEventListener('click', function() {
                var tableBody = document.getElementById('image-table-id');
                var newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td class="d-flex align-items-center">
                        <img class="pe-3"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0Wr3oWsq6KobkPqznhl09Wum9ujEihaUT4Q&s"
                            id="preview_${rowCount}" alt="Hình ảnh sản phẩm" width="50px">
                        <input type="file" class="form-control" name="list_hinh_anh[id_${rowCount}]"
                            onchange="previewImage(this, ${rowCount})">

                    </td>
                    <td>
                        <i class="fa-solid fa-trash" style="cursor: pointer;"
                            onclick="removeRow(this)"></i>
                    </td>
            `;
                tableBody.appendChild(newRow);
                rowCount++;
            })
        });

        function previewImage(input, rowIndex) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0])
            }
        }

        function removeRow(item) {
            var row = item.closest('tr');
            row.remove();
        }
    </script>
@endsection
