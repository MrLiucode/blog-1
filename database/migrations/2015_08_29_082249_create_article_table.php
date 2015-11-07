<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('category_id')->index();    //文章分类
            $table->string('title', 140);   //标题
            $table->text('content');    //内容
            $table->integer('hits')->unsigned();  //点击次数
            $table->integer('is_top')->default(0)->unsigned();  //是否置顶
            $table->integer('status')->default(1)->unsigned();  //状态[0=不发布，1=发布]
            $table->integer('user_id')->index()->unsigned();    //添加用户
            $table->integer('published_at')->unsigned();    //发布时间
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
        Schema::drop('articles');
    }
}
