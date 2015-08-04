<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function(Blueprint $table){
            $table->increments('id');
            $table->string('title', 100);   //标题
            $table->text('content');    //内容
            $table->text('content_html');   //HTML内容
            $table->integer('type')->unsigned();    //文章类型
            $table->text('description');    //描述
            $table->string('author', 20);   //作者
            $table->integer('click_num')->unsigned()->default(0);   //点击量
            $table->integer('status')->default(0);  //状态【0=正常显示，1=置顶，-1=隐藏】
            $table->integer('created_at');
            $table->integer('updated_at');
            $table->index('type');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
