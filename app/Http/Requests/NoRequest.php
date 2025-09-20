<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoRequest extends FormRequest
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
            'ma_no' => 'required|string|max:255|unique:nos,ma_no',
            'ten_no' => 'required|string|max:255',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
            'so_tien' => 'required|numeric|min:0',
            'lai_suat' => 'required|numeric|min:0|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'ma_no.required' => 'Mã nợ là bắt buộc.',
            'ten_no.required' => 'Tên nợ là bắt buộc.',
            'ngay_bat_dau.required' => 'Ngày bắt đầu là bắt buộc.',
            'ngay_ket_thuc.required' => 'Ngày kết thúc là bắt buộc.',
            'ngay_ket_thuc.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'so_tien.required' => 'Số tiền là bắt buộc.',
            'lai_suat.required' => 'Lãi suất là bắt buộc.',
            'ma_no.unique' => 'Mã nợ đã tồn tại.',
            'so_tien.min' => 'Số tiền phải lớn hơn hoặc bằng 0.',
            'lai_suat.min' => 'Lãi suất phải lớn hơn hoặc bằng 0.',
            'lai_suat.max' => 'Lãi suất không được vượt quá 100.',
        ];
    }


}
