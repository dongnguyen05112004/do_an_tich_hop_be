<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequests;
use App\Models\DanhMuc;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhMucController extends Controller
{
    public function checkLogin(LoginRequests $request)
    {
        $check = TaiKhoan::where('email', $request->email)
            ->where('password', $request->password)
            ->first();
        if ($check) {
            return response()->json([
                'status' => 1,
                'message' => "Đăng nhập thành công!",
                'token'     => $check->createToken('token_tai_khoan')->plainTextToken,
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => "Tài khoản hoặc mật khẩu không đúng.",
            ]);
        }
    }
    public function getDanhMuc()
    {
        $user = Auth::guard('sanctum')->user();
        $data = DanhMuc::where('ma_tai_khoan', $user->id)
        ->select('id', 'ten_danh_muc')
        ->get();
        return response()->json(['data' => $data]);
    }

}
