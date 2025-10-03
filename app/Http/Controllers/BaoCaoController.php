<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaoCaoController extends Controller
{

    public function getBaoCao(Request $request)
    {
        //         SELECT danh_mucs.ten_danh_muc,
        //     loai_g_d_s.ten_loai_gd,
        // 		giao__diches.so_tien,
        //     danh_mucs.mo_ta
        // FROM loai_g_d_s JOIN danh_mucs on loai_g_d_s.id = danh_mucs.ma_loai_GD join giao__diches on giao__diches.ma_danh_muc = danh_mucs.id



        $day_begin = $request->input('day_begin');
        $day_end   = $request->input('day_end');

        $query = DB::table('giao__diches')
            ->join('danh_mucs', 'giao__diches.ma_danh_muc', '=', 'danh_mucs.id')
            ->join('loai_g_d_s', 'danh_mucs.ma_loai_GD', '=', 'loai_g_d_s.id');

        // Nếu có chọn ngày thì lọc theo created_at
        if ($day_begin && $day_end) {
            $query->whereBetween('giao__diches.created_at', [$day_begin, $day_end]);
        }

        $baoCao = DB::table('giao__diches')
            ->join('danh_mucs', 'giao__diches.ma_danh_muc', '=', 'danh_mucs.id')
            ->join('loai_g_d_s', 'danh_mucs.ma_loai_GD', '=', 'loai_g_d_s.id')
            ->select(
                'danh_mucs.ten_danh_muc',
                'loai_g_d_s.ten_loai_gd',
                'giao__diches.so_tien',
                'danh_mucs.mo_ta'
            )
            ->get();

        // SELECT
        //     SUM(CASE WHEN loai_g_d_s.ten_loai_gd = 'Thu Nhập' THEN giao__diches.so_tien ELSE 0 END) AS tong_thu_nhap,
        //     SUM(CASE WHEN loai_g_d_s.ten_loai_gd = 'Chi Tiêu' THEN giao__diches.so_tien ELSE 0 END) AS tong_chi_tieu,
        // 		SUM(CASE WHEN loai_g_d_s.ten_loai_gd = 'Thu Nhập' THEN giao__diches.so_tien ELSE 0 END) -
        //     SUM(CASE WHEN loai_g_d_s.ten_loai_gd = 'Chi Tiêu' THEN giao__diches.so_tien ELSE 0 END) AS chenh_lech
        // FROM loai_g_d_s
        // JOIN danh_mucs
        //     ON loai_g_d_s.id = danh_mucs.ma_loai_GD
        // JOIN giao__diches
        //     ON giao__diches.ma_danh_muc = danh_mucs.id;
        $tongHop = DB::table('giao__diches')->join('danh_mucs', 'giao__diches.ma_danh_muc', '=', 'danh_mucs.id')->join('loai_g_d_s', 'danh_mucs.ma_loai_GD', '=', 'loai_g_d_s.id')->selectRaw(" SUM(CASE WHEN loai_g_d_s.ten_loai_gd = 'Thu Nhập' THEN giao__diches.so_tien ELSE 0 END) AS tong_thu_nhap, SUM(CASE WHEN loai_g_d_s.ten_loai_gd = 'Chi Tiêu' THEN giao__diches.so_tien ELSE 0 END) AS tong_chi_tieu, SUM(CASE WHEN loai_g_d_s.ten_loai_gd = 'Thu Nhập' THEN giao__diches.so_tien ELSE 0 END) - SUM(CASE WHEN loai_g_d_s.ten_loai_gd = 'Chi Tiêu' THEN giao__diches.so_tien ELSE 0 END) AS chenh_lech ")->first();
        $list_danh_muc = [];
        $list_loai = [];
        $list_so_tien = [];
        $list_mo_ta = [];
        foreach ($baoCao as $value) {
            $list_danh_muc[] = $value->ten_danh_muc;
            $list_loai[] = $value->ten_loai_gd;
            $list_so_tien[] = $value->so_tien;
            $list_mo_ta[] = $value->mo_ta;
        }
        return response()->json([
            'danh_muc' => $list_danh_muc,
            'loai_gd' => $list_loai,
            'so_tien' => $list_so_tien,
            'mo_ta' => $list_mo_ta,
            'tong_tien_thu' => $tongHop->tong_thu_nhap,
            'tong_tien_chi' => $tongHop->tong_chi_tieu,
            'chenh_lech' => $tongHop->chenh_lech,
        ]);
    }
    public function getBaoCaogiadinh(Request $request)
    {
        //         SELECT DISTINCT danh_mucs.ten_danh_muc, loai_g_d_s.id,
        //     loai_g_d_s.ten_loai_gd,
        //     danh_mucs.ma_loai_GD,
        //     danh_mucs.mo_ta,
        // 		tai_khoans.ten_tai_khoan
        // FROM loai_g_d_s JOIN danh_mucs on loai_g_d_s.id = danh_mucs.ma_loai_GD join giao__diches on giao__diches.ma_danh_muc = danh_mucs.id
        //  join thanh_vien_gia_dinhs on giao__diches.ma_TVGD = thanh_vien_gia_dinhs.id join tai_khoans on thanh_vien_gia_dinhs.ma_tai_khoan = tai_khoans.id

        $day_begin = $request->input('day_begin');
        $day_end   = $request->input('day_end');
        $maTaiKhoan = $request->input('ma_tai_khoan'); // thêm tham số tài khoản

        $query = DB::table('giao__diches')
            ->join('danh_mucs', 'giao__diches.ma_danh_muc', '=', 'danh_mucs.id')
            ->join('loai_g_d_s', 'danh_mucs.ma_loai_GD', '=', 'loai_g_d_s.id')
            ->join('thanh_vien_gia_dinhs', 'giao__diches.ma_TVGD', '=', 'thanh_vien_gia_dinhs.id')
            ->join('tai_khoans', 'thanh_vien_gia_dinhs.ma_tai_khoan', '=', 'tai_khoans.id');

        // Lọc theo ngày
        if ($day_begin && $day_end) {
            $query->whereBetween('giao__diches.created_at', [$day_begin, $day_end]);
        }

        // Lọc theo tài khoản nếu có
        if ($maTaiKhoan && $maTaiKhoan !== 'all') {
            $query->where('tai_khoans.id', $maTaiKhoan);
        }

        $baoCao = $query->select(
            'danh_mucs.ten_danh_muc',
            'loai_g_d_s.ten_loai_gd',
            'giao__diches.so_tien',
            'danh_mucs.mo_ta',
            'tai_khoans.ten_tai_khoan'
        )
            ->get();

        // Tổng hợp
        $tongHop = $query->selectRaw("
            SUM(CASE WHEN loai_g_d_s.ten_loai_gd = 'Thu Nhập' THEN giao__diches.so_tien ELSE 0 END) AS tong_thu_nhap,
            SUM(CASE WHEN loai_g_d_s.ten_loai_gd = 'Chi Tiêu' THEN giao__diches.so_tien ELSE 0 END) AS tong_chi_tieu,
            SUM(CASE WHEN loai_g_d_s.ten_loai_gd = 'Thu Nhập' THEN giao__diches.so_tien ELSE 0 END) -
            SUM(CASE WHEN loai_g_d_s.ten_loai_gd = 'Chi Tiêu' THEN giao__diches.so_tien ELSE 0 END) AS chenh_lech
        ")
            ->first();

        // Xuất dữ liệu ra FE
        $list_danh_muc = [];
        $list_loai = [];
        $list_so_tien = [];
        $list_mo_ta = [];
        foreach ($baoCao as $value) {
            $list_danh_muc[] = $value->ten_danh_muc;
            $list_loai[] = $value->ten_loai_gd;
            $list_so_tien[] = $value->so_tien;
            $list_mo_ta[] = $value->mo_ta;
        }

        return response()->json([
            'danh_muc'       => $list_danh_muc,
            'loai_gd'        => $list_loai,
            'so_tien'        => $list_so_tien,
            'mo_ta'          => $list_mo_ta,
            'tong_tien_thu'  => $tongHop->tong_thu_nhap,
            'tong_tien_chi'  => $tongHop->tong_chi_tieu,
            'chenh_lech'     => $tongHop->chenh_lech,
        ]);
    }
}
