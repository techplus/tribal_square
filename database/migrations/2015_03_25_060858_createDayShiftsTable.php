<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayShiftsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('day_shifts',function($table){
			$table->increments('id');
			$table->integer('user_id')->nullable()->default(0);
			$table->integer('day_id')->nullable()->default(0);
			$table->integer('shift_id')->nullable()->default(0);			
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
		Schema::drop('day_shifts');
	}

}
