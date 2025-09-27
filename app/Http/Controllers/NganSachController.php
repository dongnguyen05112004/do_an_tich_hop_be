<?php

namespace App\Http\Controllers;

use App\Models\NganSach;
use Illuminate\Http\Request;

class NganSachController extends Controller
{
    public function getdata()
    {
        $data = NganSach::all();
        return response()->json(['data' => $data]);
    }

    public function themNganSach(Request $request)
    {
        $data = $request->all();
        $ngansach = NganSach::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Thêm ngân sách thành công',
            'data' => $ngansach
        ]);
    }

    public function suaNganSach(Request $request)
    {
        $ngansach = NganSach::where('ma_ns', $request->ma_ns)->first();
        if ($ngansach) {
            $ngansach->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công',
                'data' => $ngansach]);
        }
        return response()->json(['message' => 'Không tìm thấy ngân sách']);
    }

    public function xoaNganSach(Request $request)
    {
        $ngansach = NganSach::where('ma_ns', $request->ma_ns)->first();
        if ($ngansach) {
            $ngansach->delete();
            return response()->json([
                'message' => 'Xóa thành công',
                'status' => true
            ]);
        }
        return response()->json([
            'message' => 'Không tìm thấy ngân sách'
        ]);
    }
}
