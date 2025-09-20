<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaoCaoController extends Controller
{

    public function getBaoCao(Request $request)
    {
        // SELECT tai_khoans.ten_nguoi_dung,thunhaps.danh_muc,chitieus.danh_muc,thunhaps.so_tien,chitieus.so_tien, SUM(thunhaps.so_tien) as tong_tien_thu ,SUM(chitieus.so_tien) as tong_tien_chi
        // from thunhaps join tai_khoans on tai_khoans.id = thunhaps.id JOIN chitieus ON tai_khoans.id = chitieus.id
        // GROUP BY tai_khoans.ten_nguoi_dung
        $baoCao = DB::table('thunhaps')
            ->join('tai_khoans', 'tai_khoans.id', '=', 'thunhaps.id')
            ->join('chitieus', 'tai_khoans.id', '=', 'chitieus.id')
            ->select(
                'tai_khoans.ten_nguoi_dung',
                'thunhaps.danh_muc as thu_nhap_danh_muc',
                'chitieus.danh_muc as chi_tieu_danh_muc',
                'thunhaps.so_tien as so_tien_thu',
                'chitieus.so_tien as so_tien_chi',
                DB::raw('SUM(thunhaps.so_tien) as tong_tien_thu'),
                DB::raw('SUM(chitieus.so_tien) as tong_tien_chi')
            )
            ->groupBy('tai_khoans.ten_nguoi_dung', 'thunhaps.danh_muc', 'chitieus.danh_muc',
                'thunhaps.so_tien', 'chitieus.so_tien')
            ->get();

        $list_ten = [];
        $list_tien_thu = [];
        $list_tien_chi = [];
        $danh_muc_thu = [];
        $danh_muc_chi = [];
        foreach ($baoCao as $key => $value) {
            array_push($list_ten, $value->ten_nguoi_dung);
            array_push($list_tien_thu, $value->so_tien_thu );
            array_push($list_tien_chi, $value->so_tien_chi );
            array_push($danh_muc_thu, $value->thu_nhap_danh_muc);
            array_push($danh_muc_chi, $value->chi_tieu_danh_muc);



        }
        $chenh_lech = array_sum($list_tien_thu) - array_sum($list_tien_chi);
        return response()->json([
            'list_ten' => $list_ten,
            'list_tien_thu_chi' => array_merge($list_tien_thu, $list_tien_chi),
            'danh_muc_thu_chi' => array_merge($danh_muc_thu, $danh_muc_chi),
            'tong_tien_thu' => array_sum($list_tien_thu),
            'tong_tien_chi' => array_sum($list_tien_chi),
            'chenh_lech' => $chenh_lech,
        ]);

    }
}
