<?php

namespace App\Http\Controllers;

use App\Models\NganSach;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NganSachController extends Controller
{
    public function checkLogin(Request $request)
    {
        $check = TaiKhoan::where('email', $request->email)
            ->where('mat_khau', $request->mat_khau)
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
    public function getdata()
    {
        $user = Auth::guard('sanctum')->user();
        $data = NganSach::join('danh_mucs', 'ngan_saches.ma_danh_muc', '=', 'danh_mucs.id')
            ->select(
                'ngan_saches.id',
                'ngan_saches.ma_tai_khoan',
                'ngan_saches.ma_danh_muc',
                'ngan_saches.han_muc',
                'danh_mucs.ten_danh_muc'
            )
            ->where('ngan_saches.ma_tai_khoan', $user->id)
            ->get();
        return response()->json(['data' => $data]);
    }

    public function themNganSach(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        NganSach::create([
            'ma_tai_khoan' => $user->id,
            'ma_danh_muc' => $request->ma_danh_muc,
            'han_muc' => $request->han_muc,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm ngân sách thành công',
        ]);
    }

    public function suaNganSach(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $ngansach = NganSach::where('id', $request->id)
            ->where('ma_tai_khoan', $user->id)
            ->first();
        if ($ngansach) {
            $ngansach->update([
                'ma_danh_muc' => $request->ma_danh_muc,
                'han_muc' => $request->han_muc,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Sửa ngân sách thành công',
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Không tìm thấy ngân sách cần sửa',
        ]);
    }


    public function xoaNganSach(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
    $ngansach = NganSach::where('id', $request->id)
        ->where('ma_tai_khoan', $user->id)
        ->first();
    if ($ngansach) {
        $ngansach->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa ngân sách thành công',
        ]);
    }
    return response()->json([
        'status' => false,
        'message' => 'Không tìm thấy ngân sách cần xóa',
    ]);
    }
}
