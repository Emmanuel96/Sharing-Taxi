<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts',function(Blueprint $table)
		{
			$table ->increments('postId');
			$table ->string('firstName');
			$table ->string('lastName');
			$table ->string('userId');
			$table ->string('studentId');
			$table ->string('campus');
			$table ->string('destination');
			$table ->string('dateTime');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */

	public function down()
	{
		Schema::drop('posts');
	}

}
