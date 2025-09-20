<?php

use App\Http\Controllers\BaoCaoController;
use App\Http\Controllers\NoController;

use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\thunhapController;
use App\Http\Controllers\TietKiemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//thu nhap
Route::get('/canhan/thunhap/data', [thunhapController::class, 'getThuNhap']);
Route::post('/canhan/thunhap/them', [thunhapController::class, 'themThuNhap']);
Route::post('/canhan/thunhap/sua', [thunhapController::class, 'suaThuNhap']);
Route::post('/canhan/thunhap/xoa', [thunhapController::class, 'xoaThuNhap']);
//no
Route::get('/canhan/no/data', [NoController::class, 'getNo']);
Route::post('/canhan/no/them', [NoController::class, 'themNo']);
Route::post('/canhan/no/sua', [NoController::class, 'suaNo']);
Route::post('/canhan/no/xoa', [NoController::class, 'xoaNo']);
//tiet kiem
Route::get('/canhan/tietkiem/data', [TietKiemController::class, 'getdata']);
Route::post('/canhan/tietkiem/them', [TietKiemController::class, 'themTietKiem']);
Route::post('/canhan/tietkiem/sua', [TietKiemController::class, 'suaTietKiem']);
Route::post('/canhan/tietkiem/xoa', [TietKiemController::class, 'xoaTietKiem']);
// Khach hang
Route::post('/khach-hang/dang-nhap', [TaiKhoanController::class, 'DangNhap']);
Route::get('/khach-hang/get-data', [TaiKhoanController::class, 'getdata']);
Route::post('/khach-hang/sua-profile', [TaiKhoanController::class, 'suaprofile']); 
Route::post('/khach-hang/doi-password', [TaiKhoanController::class, 'doipassword']);
Route::post('/dang-ky', [TaiKhoanController::class, 'Dangky']);


//baocao
Route::get('/canhan/baocao', [BaoCaoController::class, 'getBaoCao']);


