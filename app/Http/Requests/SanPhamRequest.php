<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ten_san_pham' => 'required|max:255',
            'gia_san_pham' => 'required|numeric',
            'gia_khuyen_mai' => 'required|numeric|lt:gia_san_pham',
            'hinh_anh' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
            'so_luong' => 'required|integer|min:0',
            'ngay_nhap' => 'required|date',
            'mo_ta' => 'required',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
        ];
    }


    public function messages():array
    {
        return [
            'ten_san_pham.required' => 'Tên sản phẩm là bắt buộc.',
            'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'gia_san_pham.required' => 'Giá sản phẩm là bắt buộc.',
            'gia_san_pham.numeric' => 'Giá sản phẩm phải là số.',
            'gia_khuyen_mai.required' => 'Giá khuyến mãi là bắt buộc.',
            'gia_khuyen_mai.numeric' => 'Giá khuyến mãi phải là số.',
            'gia_khuyen_mai.lt' => 'Giá khuyến mãi phải nhỏ hơn giá sản phẩm.',
            'hinh_anh.required' => 'Hình ảnh là bắt buộc.',
            'hinh_anh.image' => 'Tệp tải lên phải là hình ảnh.',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpg, jpeg, png, hoặc gif.',
            'so_luong.required' => 'Số lượng là bắt buộc.',
            'so_luong.integer' => 'Số lượng phải là số nguyên.',
            'so_luong.min' => 'Số lượng không được nhỏ hơn 0.',
            'ngay_nhap.required' => 'Ngày nhập là bắt buộc.',
            'ngay_nhap.date' => 'Ngày nhập phải là ngày hợp lệ.',
            'mo_ta' => 'Mô tả không được bỏ trống',
            'danh_muc_id.required' => 'Danh mục ID là bắt buộc.',
            'danh_muc_id.exists' => 'Danh mục ID phải tồn tại trong danh sách danh mục.',
        ];
    }
}
