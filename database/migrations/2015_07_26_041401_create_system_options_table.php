<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_option', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->string('name', 50);
            $table->text('value', 100);
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
        Schema::drop('system_option');
    }
}
