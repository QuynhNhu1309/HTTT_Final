<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongTinGiaoHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_tin_giao_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tai_khoan');
            $table->string('dia_chi');
            $table->string('so_dien_thoai',11);
            $table->string('ten_nguoi_nhan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thong_tin_giao_hang');
    }
}
