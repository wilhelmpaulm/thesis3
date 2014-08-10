<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('case_id')->nullable();
			$table->string('status')->nullable();
			$table->integer('priority')->nullable();
			$table->string('title')->nullable();
			$table->text('body')->nullable();
			$table->string('date_start');
			$table->string('date_end');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
