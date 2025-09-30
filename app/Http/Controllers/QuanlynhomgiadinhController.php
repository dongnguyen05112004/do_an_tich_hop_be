<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuanlynhomgiadinhController extends Controller
{
    public function qlgiadinh(Request $request)
    {
    //         SELECT DISTINCT tai_khoans.ten_tai_khoan,tai_khoans.email, giao__diches.so_tien as thu_nhap,
    // CASE
    //         WHEN thanh_vien_gia_dinhs.chu_gia_dinh = true THEN 'Chủ gia đình'
    //         ELSE 'Không phải chủ gia đình'
    //     END AS vai_tro
    //  FROM loai_g_d_s JOIN danh_mucs on loai_g_d_s.id = danh_mucs.ma_loai_GD join giao__diches on giao__diches.ma_danh_muc = danh_mucs.id
    //  join thanh_vien_gia_dinhs on giao__diches.ma_TVGD = thanh_vien_gia_dinhs.id join tai_khoans on thanh_vien_gia_dinhs.ma_tai_khoan = tai_khoans.id
    //  WHERE loai_g_d_s.ten_loai_gd = 'Thu Nhập';

        $qlgiadinh = DB::table('giao__diches')
            ->join('danh_mucs', 'giao__diches.ma_danh_muc', '=', 'danh_mucs.id')
            ->join('loai_g_d_s', 'danh_mucs.ma_loai_GD', '=', 'loai_g_d_s.id')
            ->join('thanh_vien_gia_dinhs', 'giao__diches.ma_TVGD', '=', 'thanh_vien_gia_dinhs.id')
            ->join('tai_khoans', 'thanh_vien_gia_dinhs.ma_tai_khoan', '=', 'tai_khoans.id')
            ->where('loai_g_d_s.ten_loai_gd', 'Thu Nhập')
            ->select(
                'tai_khoans.ten_tai_khoan',
                'tai_khoans.email',
                'giao__diches.so_tien as thu_nhap',
                DB::raw("CASE WHEN thanh_vien_gia_dinhs.chu_gia_dinh = true THEN 'Chủ gia đình' ELSE 'Không phải chủ gia đình' END AS vai_tro")
            )
            ->distinct()
            ->get();

        return response()->json([
            'status' => 200,
            'qlgiadinh' => $qlgiadinh
        ]);

    }
}
