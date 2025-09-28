<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequests;
use App\Http\Requests\tietkiemRequest;
use App\Models\TaiKhoan;
use App\Models\tietkiem;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TietKiemController extends Controller
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
    private function TaoMaTietKiem()
    {
        $lastRecord = TietKiem::orderBy('id', 'desc')->first();
        if (!$lastRecord) {
            return 'TK0001';
        }

        $lastId = $lastRecord->id + 1;
        return 'TK' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
    }
    public function getdata()
    {
        $data = TietKiem::all();
        return response()->json(['data' => $data]);
    }

    public function themTietKiem(tietkiemRequest $request)
    {
        $user = Auth::guard('sanctum')->user();
        tietkiem::create([
            'ma_tiet_kiem' => $this->TaoMaTietKiem(),
            'ten_tiet_kiem' => $request->ten_tiet_kiem,
            'ma_tai_khoan' => $user->id,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'lai_suat' => $request->lai_suat,
            'ghi_chu' => $request->ghi_chu,
        ]);
        return response()->json([
            'status' => 1,
            'message' => 'Thêm tiết kiệm thành công!',
        ]);
    }
    public function suaTietKiem(tietkiemRequest $request)
    {
        $tietKiem = tietkiem::where('ma_tiet_kiem', $request->ma_tiet_kiem)->first();
        if ($tietKiem) {
            $tietKiem->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công',
                'data' => $tietKiem
            ]);
        }
        return response()->json([
            'message' => 'Không tìm thấy tiết kiệm']);
    }

    public function xoaTietKiem(Request $request)
    {
        $tietKiem = TietKiem::where('ma_tiet_kiem', $request->ma_tiet_kiem)->first();
        if ($tietKiem) {
            $tietKiem->delete();
            return response()->json([
                'message' => 'Xóa thành công',
                'status' => true
            ]);
        }
        return response()->json([
            'message' => 'Không tìm thấy tiết kiệm'
        ]);
    }
}
