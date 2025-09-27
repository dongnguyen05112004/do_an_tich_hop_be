<?php

namespace App\Http\Controllers;

use App\Models\chitieu;
use Illuminate\Http\Request;

class chitieuController extends Controller
{
    public function getChiTieu()
    {
        $data = chitieu::all();
        return response()->json(['data' => $data]);
    }

    public function themChiTieu(Request $request)
    {
        $data = $request->all();
        $chitieu = chitieu::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Thêm chi tiêu thành công',
            'data' => $chitieu
        ]);
    }

    public function suaChiTieu(Request $request)
    {
        $chitieu = chitieu::where('ma_chi', $request->ma_chi)->first();
        if ($chitieu) {
            $chitieu->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công',
                'data' => $chitieu]);
        }
        return response()->json(['message' => 'Không tìm thấy chi tiêu']);
    }

    public function xoaChiTieu(Request $request)
    {
        $chitieu = chitieu::where('ma_chi', $request->ma_chi)->first();
        if ($chitieu) {
            $chitieu->delete();
            return response()->json([
                'message' => 'Xóa thành công',
                'status' => true
            ]);
        }
        return response()->json([
            'message' => 'Không tìm thấy chi tiêu'
        ]);
    }
}
