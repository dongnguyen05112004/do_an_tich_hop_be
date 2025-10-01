<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequests;
use App\Models\chitieuGiadinh;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class chitieugiadinhController extends Controller
{
    public function checkLogin(LoginRequests $request)
    {
        $check = TaiKhoan::where('email', $request->email)
            ->where('mat-khau', $request->password)
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
        $data = chitieuGiadinh::all();
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
            'ma_chi_gd',
            'ten_chi_tieu_gd',
            'danh_muc_gd',
            'so_tien_gd',
            'ngay_gd',
            'mo_ta_gd',
        ]);
 
        $data['id_tai_khoan'] = $user->id;

        if (!isset($data['ma_chi_gd'])) {
            $data['ma_chi_gd'] = 'CTGD' . time();
        }

        $chitieu = chitieuGiadinh::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Thêm chi tiêu gia đình thành công',
            'data' => $chitieu
        ]);
    }


    public function suaChiTieu(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Chưa đăng nhập hoặc token không hợp lệ'], 401);
        }

        $id = $request->input('id');
        $maChi = $request->input('ma_chi_gd');

        $chitieu = null;

        if ($id) {
            $chitieu = chitieuGiadinh::find($id);
        } elseif ($maChi) {
            $chitieu = chitieuGiadinh::where('ma_chi_gd', $maChi)->first();
        }

        if (!$chitieu) {
            return response()->json(['status' => false, 'message' => 'Chi tiêu gia đình không tồn tại'], 404);
        }


        $data = $request->only([
            'ma_chi_gd',
            'ten_chi_tieu_gd',
            'danh_muc_gd',
            'so_tien_gd',
            'ngay_gd',
            'mo_ta_gd',
        ]);
        $chitieu->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật chi tiêu gia đình thành công',
            'data' => $chitieu
        ]);
    }


    public function xoaChiTieu(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Chưa đăng nhập hoặc token không hợp lệ'], 401);
        }

        $id = $request->input('id');
        $maChi = $request->input('ma_chi_gd');

        $chitieu = null;


        if ($id) {
            $chitieu = chitieuGiadinh::find($id);
        } elseif ($maChi) {
            $chitieu = chitieuGiadinh::where('ma_chi_gd', $maChi)->first();
        }

        if (!$chitieu) {
            return response()->json(['status' => false, 'message' => 'Chi tiêu gia đình không tồn tại'], 404);
        }

        $chitieu->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa chi tiêu gia đình thành công'
        ]);
    }
}
