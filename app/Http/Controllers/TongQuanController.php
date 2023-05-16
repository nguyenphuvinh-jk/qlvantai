<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\HoaDon;
use App\DonHang;
use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class TongQuanController extends Controller
{
    public function index(){
        $dh_thanhtoan = HoaDon::where('trangthai', '=', 0)->count();
        $hoadon = DB::table('tbl_donhang')
            ->join('tbl_khachhang', 'tbl_khachhang.kh_id', '=', 'tbl_donhang.donvi')
            ->join('tbl_hoadon', 'tbl_hoadon.donhang_id', '=', 'tbl_donhang.dh_id')
            ->get();
        return view('trangchu.trangchu')->with(compact('hoadon', 'dh_thanhtoan'));
    }
}
