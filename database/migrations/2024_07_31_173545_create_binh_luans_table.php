<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('binh_luans', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('tai_khoan_id');
        $table->unsignedBigInteger('san_pham_id');
        $table->text('noi_dung');
        $table->timestamp('thoi_gian')->useCurrent();
        $table->boolean('trang_thai')->default(1);
        $table->foreign('tai_khoan_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('san_pham_id')->references('id')->on('san_phams')->onDelete('cascade');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luans');
    }
};
