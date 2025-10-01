<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class chitieugiadinhRequest extends FormRequest
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
            'ma_chi_gd' => 'required|string|max:10|unique:chitieu_giadinhs,ma_chi_gd',
            'ten_chi_tieu_gd' => 'required|string|max:100',
            'danh_muc_gd' => 'required|string|max:50',
            'so_tien_gd' => 'required|numeric|min:0',
            'ngay_gd' => 'required|date',
            'mo_ta_gd' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'ma_chi_gd.required' => 'Mã chi tiêu gia đình không được để trống.',
            'ma_chi_gd.string' => 'Mã chi tiêu gia đình phải là chuỗi ký tự.',
            'ma_chi_gd.max' => 'Mã chi tiêu gia đình không được vượt quá 10 ký tự.',
            'ma_chi_gd.unique' => 'Mã chi tiêu gia đình đã tồn tại.',

            'ten_chi_tieu_gd.required' => 'Tên chi tiêu gia đình không được để trống.',
            'ten_chi_tieu_gd.string' => 'Tên chi tiêu gia đình phải là chuỗi ký tự.',
            'ten_chi_tieu_gd.max' => 'Tên chi tiêu gia đình không được vượt quá 100 ký tự.',

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
