<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoiMatKhauRequest extends FormRequest
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
            'old_mat_khau' => 'required|string|min:6|max:255',
            'mat_khau' => 'required|string|max:255',
            're_mat_khau' => 'required|string|min:6|max:255|same:mat_khau',

        ];
    }
    public function messages(): array
    {
        return [
            'old_mat_khau.required' => 'Mật khẩu cũ là bắt buộc',
            'old_mat_khau.min' => 'Mật khẩu cũ phải có ít nhất 6 ký tự',
            'old_mat_khau.max' => 'Mật khẩu cũ không được vượt quá 255 ký tự',
            'mat_khau.required' => 'Mật khẩu mới là bắt buộc',
            'mat_khau.max' => 'Mật khẩu mới không được vượt quá 255 ký tự',
            're_mat_khau.required' => 'Xác nhận mật khẩu là bắt buộc',
            're_mat_khau.min' => 'Xác nhận mật khẩu phải có ít nhất 6 ký tự',
            're_mat_khau.max' => 'Xác nhận mật khẩu không được vượt quá 255 ký tự',
            're_mat_khau.same' => 'Xác nhận mật khẩu không khớp với mật khẩu mới',
        ];
    }
}
