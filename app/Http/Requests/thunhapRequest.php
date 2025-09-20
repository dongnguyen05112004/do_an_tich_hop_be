<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class thunhapRequest extends FormRequest
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
            'ma_thu' => 'required|string|max:255|unique:thunhaps,ma_thu',
            'ten_thu_nhap' => 'required|string|max:255',
            'danh_muc' => 'required|string|max:255',
            'so_tien' => 'required|numeric|min:0',
            'ngay' => 'required|date',
            'mo_ta' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'ma_thu.required' => 'Mã thu nhập là bắt buộc.',
            'ma_thu.unique' => 'Mã thu nhập đã tồn tại.',
            'ten_thu_nhap.required' => 'Tên thu nhập là bắt buộc.',
            'danh_muc.required' => 'Danh mục là bắt buộc.',
            'so_tien.required' => 'Số tiền là bắt buộc.',
            'so_tien.numeric' => 'Số tiền phải là một số.',
            'ngay.required' => 'Ngày là bắt buộc.',
            'ngay.date' => 'Ngày phải là một ngày hợp lệ.',
            'mo_ta.max' => 'Mô tả không được vượt quá 500 ký tự.',
        ];
    }



}
