<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Giao_Dich;
use App\Models\DanhMuc;
use App\Models\TaiKhoan;

class thunhapController extends Controller
{

    public function checkLogin(LoginRequests $request)
    {
        $check = TaiKhoan::where('email', $request->email)
            ->where('mat_khau', $request->password)
            ->first(); 
        if ($check) {
            return response()->json([
                'status' => 1,
                'message' => "Đăng nhập thành công!",
                'token' => $check->createToken('token_tai_khoan')->plainTextToken,
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => "Tài khoản hoặc mật khẩu không đúng.",
            ]);
        }
    }

    public function getThuNhap()
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
            ], 401);
        }
        $thunhap = DB::table('giao__diches as g')
            ->join('danh_mucs as d', 'g.ma_danh_muc', '=', 'd.id')
            ->join('tai_khoans as tk', 'g.ma_tai_khoan', '=', 'tk.id')
            ->where('g.ma_tai_khoan', $user->id)
            ->where('d.ma_loai_GD', '2')
            ->select(
                'g.id',
                'g.so_tien',
                'd.ten_danh_muc',
                'g.ngay_giao_dich',
                'g.ghi_chu as mo_ta',
                'tk.email as nguoi_tao'
            )
            ->orderBy('g.ngay_giao_dich', 'desc')
            ->get();

        return response()->json([
            'status' => true,
            'data' => $thunhap
        ]);
    }


    public function getDanhMucThu()
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
            ], 401);
        }
        $danhmuc = DB::table('danh_mucs as d')
            ->join('tai_khoans as tk', 'd.ma_tai_khoan', '=', 'tk.id')
            ->where('d.ma_tai_khoan', $user->id)
            ->where('d.ma_loai_GD', '2')
            ->select(
                'd.id',
                'd.ten_danh_muc',
                'd.mo_ta',
                'd.ma_tai_khoan',
                'tk.email as email_tai_khoan',
                'd.ma_gia_dinh',
                'd.ma_loai_GD'
            )
            ->get();
        return response()->json([
            'status' => true,
            'data' => $danhmuc
        ]);
    }

    public function themThuNhap(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Chưa đăng nhập'], 401);
        }

        $request->validate([
            'ma_danh_muc' => 'required|exists:danh_mucs,id',
            'so_tien' => 'required|numeric|min:0',
            'ngay_giao_dich' => 'required|date',
        ]);

        Giao_Dich::create([
            'ma_tai_khoan'   => $user->id,
            'ma_danh_muc'    => $request->ma_danh_muc,
            'so_tien'        => $request->so_tien,
            'ngay_giao_dich' => $request->ngay_giao_dich,
            'ghi_chu'        => $request->ghi_chu,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm thu nhập thành công'
        ]);
    }


    public function suaThuNhap(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Chưa đăng nhập'], 401);
        }

        $request->validate([
            'id' => 'required|exists:giao__diches,id',
            'ma_danh_muc' => 'required|exists:danh_mucs,id',
            'so_tien' => 'required|numeric|min:0',
            'ngay_giao_dich' => 'required|date',
        ]);

        $thuNhap = Giao_Dich::where('id', $request->id)
            ->where('ma_tai_khoan', $user->id)
            ->first();

        if (!$thuNhap) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy thu nhập cần sửa'], 404);
        }

        $thuNhap->update([
            'ma_danh_muc'    => $request->ma_danh_muc,
            'so_tien'        => $request->so_tien,
            'ngay_giao_dich' => $request->ngay_giao_dich,
            'ghi_chu'        => $request->ghi_chu,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thành công'
        ]);
    }


    public function xoaThuNhap(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Chưa đăng nhập'], 401);
        }

        $request->validate([
            'id' => 'required|exists:giao__diches,id',
        ]);

        $thuNhap = Giao_Dich::where('id', $request->id)
            ->where('ma_tai_khoan', $user->id)
            ->first();

        if (!$thuNhap) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy thu nhập cần xóa'], 404);
        }

        $thuNhap->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa thành công'
        ]);
    }
}
