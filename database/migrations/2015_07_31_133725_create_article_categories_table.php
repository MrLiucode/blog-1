<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_categories', function(Blueprint $table){
            $table->increments('id');
            $table->integer('pid')->default(0)->unsigned(); //节点ID
            $table->string('name', 15); //名称
            $table->string('remark', 200);  //描述
            $table->integer('sort')->default(100)->unsigned();  //排序
            $table->integer('target')->default(0)->unsigned();  //打开方式【0=新窗口打开，1=原页面】
            $table->index('pid');
            $table->integer('created_at');
            $table->integer('updated_at');
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
        Schema::drop('article_categories');
    }
}
