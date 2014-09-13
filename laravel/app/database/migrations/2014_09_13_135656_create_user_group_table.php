<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_group', function($t) {
            $t->integer('user_id')->unsigned();
            $t->integer('group_id')->unsigned();
            $t->boolean('activated');

            $t->primary(array('user_id', 'group_id'));
            $t->foreign('user_id')->references('id')->on('users');
            $t->foreign('group_id')->references('id')->on('groups');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_group');
	}

}
