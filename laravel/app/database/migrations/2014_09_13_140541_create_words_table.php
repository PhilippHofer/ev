<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('words', function($t) {
                $t->decimal('word_id',10,0);
                $t->decimal('group_id',10,0);
                $t->char('english',100);
                $t->char('german',100);


                $t->timestamps();

                $t->primary('word_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('words');
	}

}
