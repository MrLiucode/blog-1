<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAclGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acl_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('description', 255);
            $table->engine = "InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('acl_groups');
    }
}
