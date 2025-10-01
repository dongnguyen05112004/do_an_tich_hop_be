<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class thunhapgiadinhRequest extends FormRequest
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

            'ma_thu_gd' => 'required|string|max:10|unique:thunhap_giadinhs,ma_thu_gd',
            'ten_thu_nhap_gd' => 'required|string|max:100',
            'danh_muc_gd' => 'required|string|max:50',
            'so_tien_gd' => 'required|numeric|min:0',
            'ngay_gd' => 'required|date',
            'mo_ta_gd' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'ma_thu_gd.required' => 'Mã thu nhập gia đình không được để trống.',
            'ma_thu_gd.string' => 'Mã thu nhập gia đình phải là chuỗi ký tự.',
            'ma_thu_gd.max' => 'Mã thu nhập gia đình không được vượt quá 10 ký tự.',
            'ma_thu_gd.unique' => 'Mã thu nhập gia đình đã tồn tại.',

            'ten_thu_nhap_gd.required' => 'Tên thu nhập gia đình không được để trống.',
            'ten_thu_nhap_gd.string' => 'Tên thu nhập gia đình phải là chuỗi ký tự.',
            'ten_thu_nhap_gd.max' => 'Tên thu nhập gia đình không được vượt quá 100 ký tự.',

            'danh_muc_gd.required' => 'Danh mục giao dịch không được để trống.',
            'danh_muc_gd.string' => 'Danh mục giao dịch phải là chuỗi ký tự.',
            'danh_muc_gd.max' => 'Danh mục giao dịch không được vượt quá 50 ký tự.',

            'so_tien_gd.required' => 'Số tiền giao dịch không được để trống.',
            'so_tien_gd.numeric' => 'Số tiền giao dịch phải là số.',
            'so_tien_gd.min' => 'Số tiền giao dịch phải lớn hơn hoặc bằng 0.',

            'ngay_gd.required' => 'Ngày giao dịch không được để trống.',
            'ngay_gd.date' => 'Ngày giao dịch không hợp lệ.',

            'mo_ta_gd.string' => 'Mô tả giao dịch phải là chuỗi ký tự.',
            'mo_ta_gd.max' => 'Mô tả giao dịch không được vượt quá 255 ký tự.',
        ];
    }
}
