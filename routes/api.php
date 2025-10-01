<?php

use App\Http\Controllers\BaoCaoController;
use App\Http\Controllers\chitieuController;
use App\Http\Controllers\chitieugiadinhController;

use App\Http\Controllers\DanhMucController;

use App\Http\Controllers\NganSachController;
use App\Http\Controllers\NganSachgiadinhController;
use App\Http\Controllers\NoController;
use App\Http\Controllers\nogiadinhController;
use App\Http\Controllers\QuanlynhomgiadinhController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\thunhapController;
use App\Http\Controllers\thunhapgiadinhController;
use App\Http\Controllers\TietKiemController;
use App\Http\Controllers\tietkiemgiadinhController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//ca nhan

//thu nhap
Route::get('/canhan/thunhap/data', [thunhapController::class, 'getThuNhap'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/canhan/thunhap/them', [thunhapController::class, 'themThuNhap'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/canhan/thunhap/sua', [thunhapController::class, 'suaThuNhap'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/canhan/thunhap/xoa', [thunhapController::class, 'xoaThuNhap'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
//chi tieu
Route::get('/canhan/chitieu/data', [chitieuController::class, 'getChiTieu'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/canhan/chitieu/them', [chitieuController::class, 'themChiTieu'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/canhan/chitieu/sua', [chitieuController::class, 'suaChiTieu'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/canhan/chitieu/xoa', [chitieuController::class, 'xoaChiTieu'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
//no
Route::get('/canhan/no/data', [NoController::class, 'getNo']);
Route::post('/canhan/no/them', [NoController::class, 'themNo']);
Route::post('/canhan/no/sua', [NoController::class, 'suaNo']);
Route::post('/canhan/no/xoa', [NoController::class, 'xoaNo']);
//tiet kiem
Route::get('/tietkiem/check-login' , [TietKiemController::class, 'checkLogin'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::get('/canhan/tietkiem/data', [TietKiemController::class, 'getdata'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/canhan/tietkiem/them', [TietKiemController::class, 'themTietKiem'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/canhan/tietkiem/sua', [TietKiemController::class, 'suaTietKiem'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/canhan/tietkiem/xoa', [TietKiemController::class, 'xoaTietKiem'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
//ngan sach
Route::get('/canhan/ngansach/data', [NganSachController::class, 'getdata'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/canhan/ngansach/them', [NganSachController::class, 'themNganSach'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/canhan/ngansach/sua', [NganSachController::class, 'suaNganSach'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/canhan/ngansach/xoa', [NganSachController::class, 'xoaNganSach'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
// Khach hang
Route::post('/khach-hang/dang-nhap', [TaiKhoanController::class, 'DangNhap']);
Route::get('/khach-hang/get-data', [TaiKhoanController::class, 'getdata']);
Route::post('/khach-hang/sua-profile', [TaiKhoanController::class, 'suaprofile']);
Route::post('/khach-hang/doi-password', [TaiKhoanController::class, 'doipassword']);
Route::post('/dang-ky', [TaiKhoanController::class, 'Dangky']);

//danh muc
Route::get('/danhmuc', [DanhmucController::class, 'getdanhmuc'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/themdanhmuc', [DanhmucController::class, 'themdanhmuc'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/suadanhmuc', [DanhmucController::class, 'suadanhmuc'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/xoadanhmuc', [DanhmucController::class, 'xoadanhmuc'])->middleware('\App\Http\Middleware\KiemTraMiddleware');

// Danh muc
Route::get('/canhan/danhmuc/data', [DanhMucController::class, 'getDanhMuc'])->middleware('\App\Http\Middleware\KiemTraMiddleware');



//nhom gia dinh
Route::get('/qlgiadinh', [QuanlynhomgiadinhController::class, 'qlgiadinh']);

//baocao
Route::get('/canhan/baocao', [DanhMucController::class, 'getDanhMuc']);


//gia dinh
//thu nhap
Route::get('/giadinh/thunhap/data', [thunhapgiadinhController::class, 'getThuNhap'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/giadinh/thunhap/them', [thunhapgiadinhController::class, 'themThuNhap'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/giadinh/thunhap/sua', [thunhapgiadinhController::class, 'suaThuNhap'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/giadinh/thunhap/xoa', [thunhapgiadinhController::class, 'xoaThuNhap'])->middleware('\App\Http\Middleware\KiemTraMiddleware');

//chi tieu
Route::get('/giadinh/chitieu/data', [chitieugiadinhController::class, 'getChiTieu'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/giadinh/chitieu/them', [chitieugiadinhController::class, 'themChiTieu'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/giadinh/chitieu/sua', [chitieugiadinhController::class, 'suaChiTieu'])->middleware('\App\Http\Middleware\KiemTraMiddleware');
Route::post('/giadinh/chitieu/xoa', [chitieugiadinhController::class, 'xoaChiTieu'])->middleware('\App\Http\Middleware\KiemTraMiddleware');

//no
Route::get('/giadinh/no/data', [nogiadinhController::class, 'getNo']);
Route::post('/giadinh/no/them', [nogiadinhController::class, 'themNo']);
Route::post('/giadinh/no/sua', [nogiadinhController::class, 'suaNo']);
Route::post('/giadinh/no/xoa', [nogiadinhController::class, 'xoaNo']);
//tiet kiem
Route::get('/giadinh/tietkiem/data', [tietkiemgiadinhController::class, 'getdata']);
Route::post('/giadinh/tietkiem/them', [tietkiemgiadinhController::class, 'themTietKiem']);
Route::post('/giadinh/tietkiem/sua', [tietkiemgiadinhController::class, 'suaTietKiem']);
Route::post('/giadinh/tietkiem/xoa', [tietkiemgiadinhController::class, 'xoaTietKiem']);
//ngan sach
Route::get('/giadinh/ngansach/data', [NganSachgiadinhController::class, 'getdata']);
Route::post('/giadinh/ngansach/them', [NganSachgiadinhController::class, 'themNganSach']);
Route::post('/giadinh/ngansach/sua', [NganSachgiadinhController::class, 'suaNganSach']);
Route::post('/giadinh/ngansach/xoa', [NganSachgiadinhController::class, 'xoaNganSach']);
//baocaogiadinh
Route::get('/giadinh/baocaogiadinh', [BaoCaoController::class, 'getBaoCaogiadinh']);

