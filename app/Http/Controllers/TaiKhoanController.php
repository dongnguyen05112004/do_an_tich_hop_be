<?php

namespace App\Http\Controllers;

use App\Http\Requests\DangKyRequesr;
use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DoiMatKhauRequest;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaiKhoanController extends Controller
{
    public function checkToken()
    {
        $user_login = Auth::guard('sanctum')->user();
        if ($user_login) {
            return response()->json([
                'status'    => 1,
                'ten_tai_khoan'=> $user_login->ho_va_ten,
                'avatar'    => $user_login->avatar,
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn cần đăng nhập hệ thống!'
            ]);
        }
    }

    public function DangNhap(Request $request)
    {
        $TaiKhoan = TaiKhoan::where('email', $request->email)
            ->where('mat_khau', $request->mat_khau)
            ->first();
        if (!$TaiKhoan) {
            return response()->json([
                'status' => false,
                'message' => 'Đăng nhập thất bại, vui lòng kiểm tra lại thông tin đăng nhập',
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Đăng nhập thành công',
                'token' => $TaiKhoan->createToken('token_tai_khoan')->plainTextToken
            ]);
        }
    }
    
    public function getdata()
    {
        $user = Auth::guard('sanctum')->user();
        $data = TaiKhoan::find($user->id);
        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }
    public function suaprofile(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $data = TaiKhoan::find($user->id);
        if ($data) {
            $data->update([
                'ten_tai_khoan'     => $request->ten_tai_khoan,
                'sdt' => $request->sdt,
                'email'         => $request->email,
                'avatar'     => $request->avatar,
            ]);
            return response()->json([
                'status'    => 1,
                'message'   => 'Cập nhật thông tin thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Thông tin khách hàng không tồn tại!',
            ]);
        }
    }
    public function doipassword(DoiMatKhauRequest $request)
    {
        $user = Auth::guard('sanctum')->user();
        $data = TaiKhoan::where('id', $user->id)
                        ->where('mat_khau', $request->old_mat_khau)
                     ->first();
        if ($data) {
            $data->update([
                'mat_khau' => $request->mat_khau,
            ]);
            return response()->json([
                'status'    => 1,
                'message'   => 'Cập nhật mật khẩu thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Mật khẩu cũ không đúng!',
            ]);
        }
    }
    public function Dangky(DangKyRequest $request)
    {
        TaiKhoan::create([
            'ten_tai_khoan' => $request->ten_tai_khoan,
            'mat_khau' => $request->mat_khau,
            'ten_nguoi_dung' => $request->ten_nguoi_dung,
            'sdt' => $request->sdt,
            'email' => $request->email,
        ]);
        return response()->json([
            'status' => 1,
            'message' => 'Đăng ký thành công!'
        ]);
    }
}
