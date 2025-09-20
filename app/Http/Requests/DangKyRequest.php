<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
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
            'email'              => 'required|email|unique:tai_khoans,email',
            'mat_khau'          => 'required|min:6|max:255',
            're_mat_khau'       => 'required|min:6|max:255|same:mat_khau',
            'ten_tai_khoan'     => 'required|min:3|max:50',
            'ten_nguoi_dung'    => 'required|min:3|max:50',
            'sdt'               => 'required|numeric|digits_between:10,11',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'mat_khau.required' => 'Vui lòng nhập mật khẩu',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'mat_khau.max' => 'Mật khẩu không được vượt quá 255 ký tự',
            're_mat_khau.required' => 'Vui lòng xác nhận mật khẩu',
            're_mat_khau.min' => 'Xác nhận mật khẩu phải có ít nhất 6 ký tự',
            're_mat_khau.max' => 'Xác nhận mật khẩu không được vượt quá 255 ký tự',
            're_mat_khau.same' => 'Xác nhận mật khẩu không khớp',
            'ten_tai_khoan.required' => 'Vui lòng nhập tên tài khoản',
            'ten_tai_khoan.min' => 'Tên tài khoản phải có ít nhất 3 ký tự',
            'ten_tai_khoan.max' => 'Tên tài khoản không được vượt quá 50 ký tự',
            'ten_nguoi_dung.required' => 'Vui lòng nhập tên người dùng',
            'ten_nguoi_dung.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'ten_nguoi_dung.max' => 'Tên người dùng không được vượt quá 50 ký tự',
            'sdt.required' => 'Vui lòng nhập số điện thoại',
            'sdt.numeric' => 'Số điện thoại phải là số',
            'sdt.digits_between' => 'Số điện thoại phải từ 10 đến 11 số',
        ];
    }
}
