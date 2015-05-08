<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailabilityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('availabilities',function($table){
			$table->increments('id');
			$table->integer('user_id')->nullable()->default(0);
			$table->boolean('available_on_short_notice')->nullable()->default(0);
			$table->boolean('available_to_provide_daytime_care_during_summer_months')->nullable()->default(0);
			$table->boolean('available_before_school_care')->nullable()->default(0);
			$table->boolean('available_after_school_care')->nullable()->default(0);
			$table->date('schedule_valid_until');
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
		Schema::drop('availabilities');
	}

}
