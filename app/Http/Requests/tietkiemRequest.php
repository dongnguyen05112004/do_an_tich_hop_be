<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tietkiemRequest extends FormRequest
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
            'ten_tiet_kiem' => 'required|string|max:255',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
            'lai_suat' => 'required|numeric|min:0|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'ten_tiet_kiem.required' => 'Tên tiết kiệm là bắt buộc.',
            'ten_tiet_kiem.string' => 'Tên tiết kiệm phải là một chuỗi ký tự.',
            'ten_tiet_kiem.max' => 'Tên tiết kiệm không được vượt quá 255 ký tự.',
            'ngay_bat_dau.required' => 'Ngày bắt đầu là bắt buộc.',
            'ngay_ket_thuc.required' => 'Ngày kết thúc là bắt buộc.',
            'ngay_ket_thuc.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'lai_suat.required' => 'Lãi suất là bắt buộc.',
            'lai_suat.numeric' => 'Lãi suất phải là một số.',
            'lai_suat.min' => 'Lãi suất phải lớn hơn hoặc bằng 0.',
            'lai_suat.max' => 'Lãi suất không được vượt quá 100.',
        ];
    }


}
