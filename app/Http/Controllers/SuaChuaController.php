<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\SuaChua;
use App\Xe;
use Illuminate\Support\Facades\Log;
use Session;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
session_start();

class SuaChuaController extends Controller
{
    public function index(){
        $xe = Xe::all();
        $suachua = DB::table('tbl_suachua')
            ->join('tbl_xe', 'tbl_xe.xe_id', '=', 'tbl_suachua.xe_id')->get();
        return view('suachua.suachua')->with(compact('xe', 'suachua'));
    }

    public function luu(Request $request){
        $request->validate([
            "xe_id" => "required",
            "ngaysua" => "required",
            "noidung" => "required",
            "tongtien" => "required",
        ],[
            'xe_id.required' => 'Không được để trống',
            'ngaysua.required' => 'Không được để trống',
            'ngayhethan.required' => 'Không được để trống',
            'tongtien.required' => 'Không được để trống',
        ]);

        try {
            $suachua =  new SuaChua();
            $suachua->xe_id = $request->xe_id;
            $suachua->ngaysua = Carbon::createFromFormat('d/m/Y', $request->ngaysua)->toDateString();
            $suachua->noidung = $request->noidung;
            $suachua->tongtien = $request->tongtien;
            $suachua->save();
            Session::flash('message','Thêm thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Thêm thất bại!');
            return Redirect::back();
        }
    }

    public function xoa($suachua_id){
        try {
            SuaChua::where('suachua_id',$suachua_id)->delete();
            return Redirect::to('/quan-ly-xe/sua-chua/bao-duong');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Không thể xóa trường này!');
            return Redirect::to('/quan-ly-xe/sua-chua/bao-duong');
        }
    }

    public function sua($suachua_id){
        $xe = Xe::all();
        $suachua = DB::table('tbl_suachua')
            ->join('tbl_xe', 'tbl_xe.xe_id', '=', 'tbl_suachua.xe_id')->get();
        $suachua_edit = suachua::where('suachua_id',$suachua_id)->get();
        return view('suachua.suachua')->with(compact('suachua_edit', 'suachua', 'xe'));
    }

    public function capnhat(Request $request,$suachua_id){
        $request->validate([
            "xe_id" => "required",
            "ngaysua" => "required",
            "noidung" => "required",
            "tongtien" => "required",
        ],[
            'xe_id.required' => 'Không được để trống',
            'ngaysua.required' => 'Không được để trống',
            'ngayhethan.required' => 'Không được để trống',
            'tongtien.required' => 'Không được để trống',
        ]);

        try {
            $suachua = SuaChua::where('suachua_id',$suachua_id)->first();
            $suachua->xe_id = $request->xe_id;
            $suachua->ngaysua = Carbon::createFromFormat('d/m/Y', $request->ngaysua)->toDateString();
            $suachua->noidung = $request->noidung;
            $suachua->tongtien = $request->tongtien;
            $suachua->save();
            Session::flash('message','Cập nhật thành công!');
            return Redirect::to('/quan-ly-xe/sua-chua/bao-duong');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Cập nhật không thành công!!');
            return Redirect::to('/quan-ly-xe/sua-chua/bao-duong');
        }
    }
}
