<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequests;
use App\Models\chitieu;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class chitieuController extends Controller
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

    public function getChiTieu()
    {
        $data = chitieu::all();
        return response()->json(['data' => $data]);
    }

    public function themChiTieu(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Chưa đăng nhập hoặc token không hợp lệ',
            ], 401);
        }

        $data = $request->only([
            'ma_chi',
            'ten_chi_tieu',
            'danh_muc',
            'so_tien',
            'ngay',
            'mo_ta',
        ]);

        $data['id_tai_khoan'] = $user->id;

        if (!isset($data['ma_chi'])) {
            $data['ma_chi'] = 'CT' . time();
        }

        $them = chitieu::create($data);
        if ($them) {
            return response()->json([
                'status' => true,
                'message' => 'Thêm chi tiêu thành công!',
                'data' => $them,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Thêm chi tiêu thất bại!',
            ]);
        }
    }

    public function suaChiTieu(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Chưa đăng nhập hoặc token không hợp lệ'], 401);
        }

        $id = $request->input('id');
        $maChi = $request->input('ma_chi');

        $chitieu = null;

        if ($id) {
            $chitieu = chitieu::find($id);
        } elseif ($maChi) {
            $chitieu = chitieu::where('ma_chi', $maChi)->first();
        }

        if (!$chitieu) {
            return response()->json(['status' => false, 'message' => 'Chi tiêu không tồn tại'], 404);
        }

        $data = $request->only([
            'ma_chi',
            'ten_chi_tieu',
            'danh_muc',
            'so_tien',
            'ngay',
            'mo_ta',
        ]);


        $chitieu->update($data);

        return response()->json(['status' => true, 'message' => 'Cập nhật chi tiêu thành công', 'data' => $chitieu]);
    }

    public function xoaChiTieu(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Chưa đăng nhập hoặc token không hợp lệ'], 401);
        }

        $id = $request->input('id');
        $maChi = $request->input('ma_chi');

        $chitieu = null;

        if ($id) {
            $chitieu = chitieu::find($id);
        } elseif ($maChi) {
            $chitieu = chitieu::where('ma_chi', $maChi)->first();
        }

        if (!$chitieu) {
            return response()->json(['status' => false, 'message' => 'Chi tiêu không tồn tại'], 404);
        }

        if ($chitieu->id_tai_khoan !== $user->id) {
            return response()->json(['status' => false, 'message' => 'Bạn không có quyền xóa chi tiêu này'], 403);
        }

        $chitieu->delete();

        return response()->json(['status' => true, 'message' => 'Xóa chi tiêu thành công']);
    }


}
