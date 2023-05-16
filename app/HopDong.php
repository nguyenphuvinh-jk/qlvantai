<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
    protected $fillable = ['hd_id','ten_kh','ngaybatdau_hd','ngayhethan_hd','trangthai_hd'];
    protected $primaryKey='hd_id';
    public $incrementing = false;
    protected $table = 'tbl_hopdong';
}
