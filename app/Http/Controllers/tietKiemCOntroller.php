<?php

namespace App\Http\Controllers;

use App\Http\Requests\tietkiemRequest;
use App\Models\tietkiem;
use Illuminate\Http\Request;

class TietKiemController extends Controller
{
    public function getdata()
    {
        $data = TietKiem::all();
        return response()->json(['data' => $data]);
    }

    public function themTietKiem(tietkiemRequest $request)
    {
        $data = $request->validated();
        $tietKiem = TietKiem::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Thêm tiết kiệm thành công',
            'data' => $tietKiem
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
