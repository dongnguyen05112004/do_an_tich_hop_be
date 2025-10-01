<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequests;
use App\Models\TaiKhoan;
use App\Models\thunhapGiadinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class thunhapgiadinhController extends Controller
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
                'token'     => $check->createToken('token_tai_khoan')->plainTextToken,
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
        $data = thunhapGiadinh::all();
        return response()->json(['data' => $data]);
    }

    public function themThuNhap(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Chưa đăng nhập hoặc token không hợp lệ',
            ], 401);
        }

        $data = $request->only([
            'ma_thu_gd',
            'ten_thu_nhap_gd',
            'danh_muc_gd',
            'so_tien_gd',
            'ngay_gd',
            'mo_ta_gd',
        ]);

        $data['id_tai_khoan'] = $user->id;

        if (!isset($data['ma_thu_gd'])) {
            $data['ma_thu_gd'] = 'TNGD' . time();
        }

        $them = thunhapGiadinh::create($data);
        if ($them) {
            return response()->json([
                'status' => true,
                'message' => 'Thêm thu nhập thành công!',
                'data' => $them,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Thêm thu nhập thất bại!',
            ]);
        }
    }

    public function suaThuNhap(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Chưa đăng nhập hoặc token không hợp lệ'], 401);
        }

        $id = $request->input('id');
        $maThu = $request->input('ma_thu_gd');

        $thunhap = null;

        if ($id) {
            $thunhap = thunhapGiadinh::find($id);
        } elseif ($maThu) {
            $thunhap = thunhapGiadinh::where('ma_thu_gd', $maThu)->first();
        }

        if (!$thunhap) {
            return response()->json(['status' => false, 'message' => 'Chi tiêu gia đình không tồn tại'], 404);
        }

        $data = $request->only([
            'ma_thu_gd',
            'ten_thu_nhap_gd',
            'danh_muc_gd',
            'so_tien_gd',
            'ngay_gd',
            'mo_ta_gd',
        ]);
        $thunhap->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thu nhap gia đình thành công',
            'data' => $thunhap
        ]);

    }

    public function xoaThuNhap(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Chưa đăng nhập hoặc token không hợp lệ'], 401);
        }

        $id = $request->input('id');
        $maThu = $request->input('ma_thu_gd');

        $thunhap = null;

        if ($id) {
            $thunhap = thunhapGiadinh::find($id);
        } elseif ($maThu) {
            $thunhap = thunhapGiadinh::where('ma_thu_gd', $maThu)->first();
        }

        if (!$thunhap) {
            return response()->json(['status' => false, 'message' => 'Thu nhập gia đình không tồn tại'], 404);
        }

        $thunhap->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa thu nhập gia đình thành công'
        ]);
    }
}
