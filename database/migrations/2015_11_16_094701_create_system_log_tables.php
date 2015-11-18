<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemLogTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error_logs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('severity')->unsign()->index()->default(0);    //严重级别[0=警告,1=严重]

            $table->string('file_name')->index();    //文件名称(带路径)
            $table->string('type'); //错误类型
            $table->string('message');  //错误消息
            $table->text('trace_message'); //详细信息

            $table->text('headers');    //header头信息
            $table->string('http_method', 50)->index();  //请求方式
            $table->string('ip')->index();  //IP地址
            $table->string('request_url');  //请求的URL
            $table->string('user_agent');   //浏览器标识

            $table->integer('user_id'); //用户ID

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
        Schema::dropIfExists('error_logs');
    }
}
