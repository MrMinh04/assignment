<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongKesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_kes', function (Blueprint $table) {
            $table->id(); // Tạo cột `id` tự động tăng
            $table->integer('so_luong_san_pham')->default(0); // Số lượng sản phẩm
            $table->integer('so_luong_don_hang')->default(0); // Số lượng đơn hàng
            $table->integer('so_luong_tai_khoan')->default(0); // Số lượng tài khoản
            $table->integer('so_luong_danh_muc')->default(0); // Số lượng danh mục
            $table->timestamps(); // Cột `created_at` và `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thong_kes');
    }
}
