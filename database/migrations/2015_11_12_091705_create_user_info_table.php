<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->index();    //用户ID
            $table->char('mobile', 11); //手机号
            $table->string('website');  //个人网站
            $table->string('synopsis'); //个人简介
            $table->string('live_province', 50); //所在省
            $table->string('live_city', 50);    //所在市
            $table->string('live_area', 50);    //所在区
            $table->string('live_address'); //详细地址
            $table->string('position'); //职位
            $table->integer('created_at')->unsigned();
            $table->integer('updated_at')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_info');
    }
}
