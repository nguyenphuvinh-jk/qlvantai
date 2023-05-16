<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\HoaDon;
use App\DonHang;
use Illuminate\Support\Facades\Log;
use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HoaDonController extends Controller
{
    public function index(){
        $hoadon = DB::table('tbl_donhang')
        ->join('tbl_khachhang', 'tbl_khachhang.kh_id', '=', 'tbl_donhang.donvi')
        ->join('tbl_hoadon', 'tbl_hoadon.donhang_id', '=', 'tbl_donhang.dh_id')
        ->get();
        return view('hoadon.hoadon')->with(compact('hoadon'));
    }

    public function them(){
        $donhang = DonHang::all();
        return view('hoadon.them')->with(compact('donhang'));
    }

    public function luu(Request $request){
        $request->validate([
            "donhang_id" => "required|unique:tbl_hoadon",
            "phithuexe" => "nullable|numeric",
            "phinang" => "nullable|numeric",
            "phiha" => "nullable|numeric",
            "phigiayto" => "nullable|numeric",
            "philuuca" => "nullable|numeric",
            "vecauduong" => "nullable|numeric",
            "phikhac" => "nullable|numeric",
            "thue" => "nullable|numeric",

        ],[
            'donhang_id.required' => 'Không được để trống',
            'donhang_id.unique' => 'Đơn hàng đã có hóa đơn',
            'phithuexe.numeric' => 'Nhập dữ liệu kiểu số',
            'phinang.numeric' => 'Nhập dữ liệu kiểu số',
            'phiha.numeric' => 'Nhập dữ liệu kiểu số',
            'philuuca.numeric' => 'Nhập dữ liệu kiểu số',
            'vecauduong.numeric' => 'Nhập dữ liệu kiểu số',
            'phikhac.numeric' => 'Nhập dữ liệu kiểu số',
            'thue.numeric' => 'Nhập dữ liệu kiểu số',
        ]);

        $donhang_id = $request->donhang_id;
        $phithuexe = $request->phithuexe;
        $phinang = $request->phinang;
        $phiha = $request->phiha;
        $phigiayto = $request->phigiayto;
        $philuuca = $request->philuuca;
        $vecauduong = $request->vecauduong;
        $phikhac = $request->phikhac;
        $thue = $request->thue;
        $tongtien = $phithuexe + $phinang + $phiha + $phigiayto + $philuuca + $vecauduong + $phikhac;
        $ghichu = $request->ghichu;

        try {
            $hoadon =  new HoaDon();
            $hoadon->donhang_id = $donhang_id;
            $hoadon->phithuexe = $phithuexe;
            $hoadon->phinang = $phinang;
            $hoadon->phiha = $phiha;
            $hoadon->phigiayto = $phigiayto;
            $hoadon->philuuca = $philuuca;
            $hoadon->vecauduong = $vecauduong;
            $hoadon->phikhac = $phikhac;
            $hoadon->thue = $thue;
            $hoadon->tongtien = $tongtien + $tongtien*$thue/100;
            $hoadon->ghichu = $ghichu;
            $hoadon->save();
            Session::flash('message','Thêm hóa đơn thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err', 'Thêm hóa đơn thất bại!');
            return Redirect::back();
        }
    }

    public function xoa($hoadon_id){
        try {
            HoaDon::where('hoadon_id',$hoadon_id)->delete();
            Session::flash('message', 'Xóa hóa đơn thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err', 'Xóa hóa đơn thất bại!');
            return Redirect::back();
        }

    }

    public function sua($hoadon_id){
        $donhang = DonHang::all();
        $hoadon_edit = HoaDon::where('hoadon_id',$hoadon_id)->get();
        return view('hoadon.sua')->with(compact('hoadon_edit', 'donhang'));
    }

    public function capnhat(Request $request,$hoadon_id){
        $request->validate([
            "donhang_id" => "required",
            "phithuexe" => "nullable|numeric",
            "phinang" => "nullable|numeric",
            "phiha" => "nullable|numeric",
            "phigiayto" => "nullable|numeric",
            "philuuca" => "nullable|numeric",
            "vecauduong" => "nullable|numeric",
            "phikhac" => "nullable|numeric",
            "thue" => "nullable|numeric",

        ],[
            'donhang_id.required' => 'Không được để trống',
            'phithuexe.numeric' => 'Nhập dữ liệu kiểu số',
            'phinang.numeric' => 'Nhập dữ liệu kiểu số',
            'phiha.numeric' => 'Nhập dữ liệu kiểu số',
            'philuuca.numeric' => 'Nhập dữ liệu kiểu số',
            'vecauduong.numeric' => 'Nhập dữ liệu kiểu số',
            'phikhac.numeric' => 'Nhập dữ liệu kiểu số',
            'thue.numeric' => 'Nhập dữ liệu kiểu số',
        ]);

        $donhang_id = $request->donhang_id;
        $phithuexe = $request->phithuexe;
        $phinang = $request->phinang;
        $phiha = $request->phiha;
        $phigiayto = $request->phigiayto;
        $philuuca = $request->philuuca;
        $vecauduong = $request->vecauduong;
        $phikhac = $request->phikhac;
        $thue = $request->thue;
        $tongtien = $phithuexe + $phinang + $phiha + $phigiayto + $philuuca + $vecauduong + $phikhac;
        $ghichu = $request->ghichu;
        $trangthai = $request->trangthai;

        try {
            $hoadon = HoaDon::where('hoadon_id',$hoadon_id)->first();
            $hoadon->donhang_id = $donhang_id;
            $hoadon->phithuexe = $phithuexe;
            $hoadon->phinang = $phinang;
            $hoadon->phiha = $phiha;
            $hoadon->phigiayto = $phigiayto;
            $hoadon->philuuca = $philuuca;
            $hoadon->vecauduong = $vecauduong;
            $hoadon->phikhac = $phikhac;
            $hoadon->thue = $thue;
            $hoadon->tongtien = $tongtien + $tongtien*$thue/100;
            $hoadon->ghichu = $ghichu;
            $hoadon->trangthai = $trangthai;
            $hoadon->save();
            Session::flash('message','Cập nhật hóa đơn thành công!');
            return Redirect::to('/quan-ly-van-chuyen/hoa-don-van-chuyen');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message', 'Cập nhật hóa đơn thất bại!');
            return Redirect::to('/quan-ly-van-chuyen/hoa-don-van-chuyen');
        }
    }

}
