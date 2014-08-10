<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->text('memo')->nullable();
			$table->string('last_name');
			$table->string('first_name');
			$table->string('middle_name')->nullable();
			$table->string('birthdate')->nullable();
			$table->string('sex')->nullable();
			$table->string('status');
			$table->string('civil_status')->nullable();
			$table->string('date_hired')->nullable();
			$table->string('division');
			$table->string('job_title');
			$table->string('password');
			$table->string('file_picture')->nullable();
			$table->string('rank')->nullable();
			
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
		Schema::drop('users');
	}

}
