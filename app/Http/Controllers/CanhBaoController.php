<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\CanhBao;
use App\Xe;
use Illuminate\Support\Facades\Log;
use Session;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
session_start();

class CanhBaoController extends Controller
{
    public function index(){
        $xe = Xe::all();
        $canhbao = DB::table('tbl_xe')
            ->join('tbl_canhbaotaisan', 'tbl_canhbaotaisan.xe_id', '=', 'tbl_xe.xe_id')
            ->join('tbl_loaixe', 'tbl_loaixe.loaixe_id', '=', 'tbl_xe.loaixe')
            ->join('tbl_hangxe', 'tbl_hangxe.hangxe_id', '=', 'tbl_xe.hangxe')
            ->get();
        return view('canhbao.canhbao')->with(compact('xe', 'canhbao'));
    }

    public function luu(Request $request){
        $request->validate([
            "xe_id" => "required",
            "ngay" => "required",
            "tinhtrang" => "required",
            "km_hientai" => "required|numeric",
        ],[
            'xe_id.required' => 'Không được để trống',
            'ngay.required' => 'Không được để trống',
            'km_hientai.required' => 'Không được để trống',
            'km_hientai.numeric' => 'Nhập kiểu số thực',
            'tinhtrang.required' => 'Không được để trống',
        ]);

        try {
            $canhbao =  new CanhBao();
            $canhbao->ngay = Carbon::createFromFormat('d/m/Y', $request->ngay)->toDateString();
            $canhbao->xe_id = $request->xe_id;
            $canhbao->km_hientai = $request->km_hientai;
            $canhbao->tinhtrang = $request->tinhtrang;
            $canhbao->danhgia = $request->danhgia;
            $canhbao->save();
            Session::flash('message','Thêm thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Thêm thất bại!');
            return Redirect::back();
        }
    }

    public function xoa($canhbao_id){
        try {
            CanhBao::where('canhbao_id',$canhbao_id)->delete();
            return Redirect::to('/quan-ly-xe/canh-bao-tai-san');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Không thể xóa trường này!');
            return Redirect::to('/quan-ly-xe/canh-bao-tai-san');
        }
    }

    public function sua($canhbao_id){
        $xe = Xe::all();
        $canhbao = DB::table('tbl_xe')
            ->join('tbl_canhbaotaisan', 'tbl_canhbaotaisan.xe_id', '=', 'tbl_xe.xe_id')
            ->join('tbl_loaixe', 'tbl_loaixe.loaixe_id', '=', 'tbl_xe.loaixe')
            ->join('tbl_hangxe', 'tbl_hangxe.hangxe_id', '=', 'tbl_xe.hangxe')
            ->get();
        $canhbao_edit = CanhBao::where('canhbao_id',$canhbao_id)->get();
        return view('canhbao.canhbao')->with(compact('canhbao_edit', 'canhbao', 'xe'));
    }

    public function capnhat(Request $request,$canhbao_id){
        $request->validate([
            "xe_id" => "required",
            "ngay" => "required",
            "tinhtrang" => "required",
            "km_hientai" => "required|numeric",
        ],[
            'xe_id.required' => 'Không được để trống',
            'ngay.required' => 'Không được để trống',
            'km_hientai.required' => 'Không được để trống',
            'km_hientai.numeric' => 'Nhập kiểu số thực',
            'tinhtrang.required' => 'Không được để trống',
        ]);

        try {
            $canhbao = canhbao::where('canhbao_id',$canhbao_id)->first();
            $canhbao->xe_id = $request->xe_id;
            $canhbao->ngay = Carbon::createFromFormat('d/m/Y', $request->ngay)->toDateString();
            $canhbao->km_hientai = $request->km_hientai;
            $canhbao->tinhtrang = $request->tinhtrang;
            $canhbao->danhgia = $request->danhgia;
            $canhbao->save();
            Session::flash('message','Cập nhật thành công!');
            return Redirect::to('/quan-ly-xe/canh-bao-tai-san');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Cập nhật không thành công!!');
            return Redirect::to('/quan-ly-xe/canh-bao-tai-san');
        }
    }
}
