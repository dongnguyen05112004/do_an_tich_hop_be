<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequests;
use App\Http\Requests\thunhapRequest;
use App\Models\TaiKhoan;
use App\Models\thunhap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data = thunhap::all();
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
            'ma_thu',
            'ten_thu_nhap',
            'danh_muc',
            'so_tien',
            'ngay',
            'mo_ta',
        ]);

         $data['id_tai_khoan'] = $user->id;

        if (!isset($data['ma_thu'])) {
            $data['ma_thu'] = 'TN' . time();
        }

        $them = thunhap::create($data);
        if ($them) {
            return response()->json([
                'status' => true,
                'message' => 'Thêm thu nhập thành công',
                'data' => $them,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Thêm thu nhập thất bại',
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
        $maThu = $request->input('ma_thu');

        $thunhap = null;

        if ($id) {
            $thunhap = thunhap::find($id);
        } elseif ($maThu) {
            $thunhap = thunhap::where('ma_thu', $maThu)->first();
        }

        if (!$thunhap) {
            return response()->json(['status' => false, 'message' => 'Chi tiêu không tồn tại'], 404);
        }

        $data = $request->only([
            'ma_thu',
            'ten_thu_nhap',
            'danh_muc',
            'so_tien',
            'ngay',
            'mo_ta',
        ]);



        $thunhap->update($data);

        return response()->json(['status' => true, 'message' => 'Sửa thu nhập thành công', 'data' => $thunhap]);
    }

    public function xoaThuNhap(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Chưa đăng nhập hoặc token không hợp lệ'], 401);
        }

        $id = $request->input('id');
        $maThu = $request->input('ma_thu');

        $thunhap = null;

        if ($id) {
            $thunhap = thunhap::find($id);
        } elseif ($maThu) {
            $thunhap = thunhap::where('ma_thu', $maThu)->first();
        }

        if (!$thunhap) {
            return response()->json(['status' => false, 'message' => 'Thu nhập không tồn tại'], 404);
        }

        if ($thunhap->id_tai_khoan !== $user->id) {
            return response()->json(['status' => false, 'message' => 'Bạn không có quyền xóa thu nhập này'], 403);
        }

        $thunhap->delete();

        return response()->json(['status' => true, 'message' => 'Xóa thu nhập thành công']);
    }


}
