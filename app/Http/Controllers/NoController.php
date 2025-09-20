<?php

namespace App\Http\Controllers;

use App\Models\no;
use Illuminate\Http\Request;

class NoController extends Controller
{
    public function getNo()
    {
        $data = no::all();
        return response()->json(['data' => $data]);
    }
    public function themNo(Request $request)
    {
        $data = $request->validate(
            [
                'ma_no' => 'required|string|unique:nos,ma_no',
                'ten_no' => 'required|string|max:255',
                'ngay_bat_dau' => 'required|date',
                'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
                'so_tien' => 'required|integer|min:0',
                'lai_suat' => 'required|numeric|min:0',
            ]
        );
        $no = no::create($data);
        return response()->json([
            'status' => true,
            'message' => 'Thêm nợ thành công',
            'data' => $no
        ]);
    }
    public function suaNo(Request $request)
    {
        $no = no::where('ma_no', $request->ma_no)->first();
        if ($no) {
            $no->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công',
                'data' => $no
            ]);
        }
        return response()->json(['message' => 'Không tìm thấy nợ']);
    }

    public function xoaNo(Request $request)
    {
        $no = no::where('ma_no', $request->ma_no)->first();
        if ($no) {
            $no->delete();
            return response()->json([
                'message' => 'Xóa thành công',
                'status' => true
            ]);
        }
        return response()->json(['message' => 'Không tìm thấy nợ']);
    }
}
