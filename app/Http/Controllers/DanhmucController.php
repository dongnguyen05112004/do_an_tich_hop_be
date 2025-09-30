<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequests;
use App\Models\DanhMuc;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DanhmucController extends Controller
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
    public function getdanhmuc()
    {
        //          SELECT danh_mucs.ten_danh_muc, loai_g_d_s.ten_loai_gd,danh_mucs.mo_ta,giao__diches.so_tien
        // FROM loai_g_d_s JOIN danh_mucs on loai_g_d_s.id = danh_mucs.ma_loai_GD join giao__diches on giao__diches.ma_danh_muc = danh_mucs.id join gia__dinhs on danh_mucs.ma_gia_dinh = gia__dinhs.id JOIN thanh_vien_gia_dinhs on gia__dinhs.id = thanh_vien_gia_dinhs.ma_gia_dinh
        $danhmuc = DB::table('giao__diches')
            ->join('danh_mucs', 'giao__diches.ma_danh_muc', '=', 'danh_mucs.id')
            ->join('loai_g_d_s', 'danh_mucs.ma_loai_GD', '=', 'loai_g_d_s.id')
            ->join('gia__dinhs', 'danh_mucs.ma_gia_dinh', '=', 'gia__dinhs.id')
            ->join('thanh_vien_gia_dinhs', 'gia__dinhs.id', '=', 'thanh_vien_gia_dinhs.ma_gia_dinh')
            ->select(
                'danh_mucs.id',
                'danh_mucs.ten_danh_muc',
                'loai_g_d_s.ten_loai_gd',
                'danh_mucs.mo_ta',
                'giao__diches.so_tien'
            )
            ->get();

        return response()->json([
            'status' => 200,
            'danhmuc' => $danhmuc
        ]);
    }
     public function themdanhmuc(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
         DanhMuc::create([
            'ma_tai_khoan' => $user->id,
            'ma_danh_muc'  => $request->ma_danh_muc,
            'ten_danh_muc' => $request->ten_danh_muc,
            'ma_loai_GD'   => $request->ma_loai_GD,
            'mo_ta'        => $request->mo_ta,
            'so_tien'      => $request->so_tien,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Thêm danh mục thành công',

        ]);
    }

    // Sửa danh mục
    public function suadanhmuc(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $danhmuc = DanhMuc::find($request->id)->update([
            'ma_tai_khoan' => $user->id,
            'ma_danh_muc'  => $request->ma_danh_muc,
            'ten_danh_muc' => $request->ten_danh_muc,
            'ma_loai_GD'   => $request->ma_loai_GD,
            'mo_ta'        => $request->mo_ta,
            'so_tien'      => $request->so_tien,
        ]);
        return response()->json([
                'status'    => 1,
                'message'   => 'Cập nhật danh mục thành công!',
            ]);


    }

    // Xóa danh mục
    public function xoadanhmuc(Request $request )
    {
            $check = Auth::guard('sanctum')->user();
            if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn cần đăng nhập hệ thống!'
            ]);
        } else {
            $data = DanhMuc::find($request->id);
            if ($data) {
                $data->delete();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Xóa danh mục thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'danh mục không tồn tại!',
                ]);
            }
        }
    }
}


