<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //标签表
        Schema::create('tags', function(Blueprint $table){

            $table->increments('id');
            $table->string('name', 14); //标签名称
            $table->integer('click_num')->unsigned()->default(0);   //点击量
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        //文章标签关系对应表
        Schema::create('article_tags', function(Blueprint $table){

            $table->increments('id');
            $table->integer('tid')->unsigned(); //标签ID
            $table->integer('aid')->unsigned(); //文章ID
            $table->integer('created_at');
            $table->integer('updated_at');
            $table->index('tid');
            $table->index('aid');
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
        Schema::drop('tags');
        Schema::drop('article_tags');
    }
}
