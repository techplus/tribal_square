<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname')->nullable()->default(null);
			$table->string('lastname')->nullable()->default(null);			
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->integer('last_step')->nullable()->default(1);
			$table->string('logo')->nullable()->default(null);			
			$table->string('subscriber_id')->nullable()->default(null);
			$table->date('subscription_end_at')->nullable()->default(null);
			$table->datetime('last_logged_in')->nullable()->default(null);
			$table->rememberToken();
			$table->softDeletes();
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
