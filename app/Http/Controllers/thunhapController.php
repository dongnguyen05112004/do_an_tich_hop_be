<?php

namespace App\Http\Controllers;

use App\Http\Requests\thunhapRequest;
use App\Models\thunhap;
use Illuminate\Http\Request;

class thunhapController extends Controller
{
    public function getThuNhap()
    {
        $data = thunhap::all();
        return response()->json(['data' => $data]);
    }

    public function themThuNhap(thunhapRequest $request)
    {
        $data = $request->validated();
        $thunhap = thunhap::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Thêm thu nhap thành công',
            'data' => $thunhap
        ]);
    }

    public function suaThuNhap(Request $request)
    {
        $thunhap = thunhap::where('ma_thu', $request->ma_thu)->first();
        if ($thunhap) {
            $thunhap->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công',
                'data' => $thunhap]);
        }
        return response()->json(['message' => 'Không tìm thấy thu nhập']);
    }

    public function xoaThuNhap(Request $request)
    {
        $thunhap = thunhap::where('ma_thu', $request->ma_thu)->first();
        if ($thunhap) {
            $thunhap->delete();
            return response()->json([
                'message' => 'Xóa thành công',
                'status' => true
            ]);
        }
        return response()->json([
            'message' => 'Không tìm thấy thu nhập'
        ]);
    }
}
