<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts',function($table){
			$table->increments('id');
			$table->integer('user_id')->nullable()->default(0);
			$table->text('address')->nullable()->default(null);
			$table->string('street')->nullable()->default(null);
			$table->string('city')->nullbale()->default(null);
			$table->string('state')->nullbale()->default(null);
			$table->string('country')->nullbale()->default(null);
			$table->string('pin')->nullbale()->default(null);
			$table->string('phone')->nullbale()->default(null);
			$table->boolean('display_phone_on_profile')->nullbale()->default(0);
			$table->date('birthdate')->nullbale()->default(null);
			$table->enum('gender',[ 'Male' , 'Female' ])->nullbale()->default(null);
			$table->text('profile_pic')->nullbale()->default(null);
			$table->string('nationality')->nullbale()->default(null);
			$table->string('religion')->nullbale()->default(null);
			$table->softDeletes();
			$table->timeStamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
	}

}
