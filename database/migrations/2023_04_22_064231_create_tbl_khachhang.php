<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblKhachhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_khachhang', function (Blueprint $table) {
            $table->string('kh_id',10)->primary();
            $table->string('ten_kh', 20);
            $table->integer('sdt_kh');
            $table->string('diachi_kh', 255);
            $table->integer('masothue_kh')->nullable();
            $table->integer('fax_kh')->nullable();
            $table->integer('sotk_kh')->nullable();
            $table->string('ten_nganhang', 255)->nullable();
            $table->string('nguoidaidien_kh', 50)->nullable();
            $table->string('chucvu_kh', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_khachhang');
    }
}
