<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TaiXe;
use Illuminate\Support\Facades\Log;
use Session;
use Carbon\Carbon;
use App\Helper\Helper;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class TaiXeController extends Controller
{
    public function index(){
        $taixe = TaiXe::all();
        return view('taixe.taixe')->with(compact('taixe'));
    }

    public function them(){
        return view('taixe.them');
    }

    public function luu(Request $request){
        $request->validate([
            "ten_taixe" => "required",
            "sdt" => "required|numeric",
            "CCCD" => "nullable|unique:tbl_taixe|numeric",
            "tknh" => "nullable|numeric",

        ],[
            'ten_taixe.required' => 'Không được để trống',
            'sdt.required' => 'Không được để trống',
            'sdt.numeric' => 'Nhập dữ liệu kiểu số',
            'CCCD.unique' => 'Số CCCD bị trùng',
            'CCCD.numeric' => 'Nhập dữ liệu kiểu số',
            'tknh.numeric' => 'Nhập dữ liệu kiểu số',
        ]);

        $taixe_id = Helper::IDCustomize(new TaiXe(), 'taixe_id', 5, 'LX');

        try {
            $taixe =  new TaiXe();
            $taixe->taixe_id = $taixe_id;
            $taixe->ten_taixe = $request->ten_taixe;
            $taixe->ngaysinh = Carbon::createFromFormat('d/m/Y', $request->ngaysinh)->toDateString();
            $taixe->sdt = $request->sdt;
            $taixe->diachi = $request->diachi;
            $taixe->CCCD = $request->CCCD;
            $taixe->tknh = $request->tknh;
            $taixe->save();
            Session::flash('message','Thêm lái xe thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err', 'Thêm lái xe thất bại!');
            return Redirect::back();
        }
    }

    public function xoa($taixe_id){
        try {
            TaiXe::where('taixe_id',$taixe_id)->delete();
            Session::flash('message', 'Xóa lái xe thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err', 'Xóa lái xe thất bại!');
            return Redirect::back();
        }

    }

    public function sua($taixe_id){
        $taixe_edit = TaiXe::where('taixe_id',$taixe_id)->get();
        return view('taixe.sua')->with(compact('taixe_edit'));
    }

    public function capnhat(Request $request,$taixe_id){
        $request->validate([
            "ten_taixe" => "required",
            "sdt" => "required|numeric",
            "CCCD" => "nullable|unique:tbl_taixe|numeric",
            "tknh" => "nullable|numeric",

        ],[
            'ten_taixe.required' => 'Không được để trống',
            'sdt.required' => 'Không được để trống',
            'sdt.numeric' => 'Nhập dữ liệu kiểu số',
            'CCCD.unique' => 'Số CCCD bị trùng',
            'CCCD.numeric' => 'Nhập dữ liệu kiểu số',
            'tknh.numeric' => 'Nhập dữ liệu kiểu số',
        ]);

        try {
            $taixe = TaiXe::where('taixe_id',$taixe_id)->first();
            $taixe->ten_taixe = $request->ten_taixe;
            $taixe->ngaysinh = Carbon::createFromFormat('d/m/Y', $request->ngaysinh)->toDateString();
            $taixe->sdt = $request->sdt;
            $taixe->diachi = $request->diachi;
            $taixe->CCCD = $request->CCCD;
            $taixe->tknh = $request->tknh;
            $taixe->save();
            Session::flash('message','Cập nhật lái xe thành công!');
            return Redirect::to('/quan-ly-tai-xe/thong-tin-tai-xe');
        }catch (\Exception $e){
            Session::flash('message', 'Cập nhật lái xe thất bại!');
            return Redirect::to('/quan-ly-tai-xe/thong-tin-tai-xe');
        }
    }
}
