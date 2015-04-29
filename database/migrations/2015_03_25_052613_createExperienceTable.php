<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experiences',function($table){
			$table->increments('id');
			$table->integer('user_id')->nullable()->default(0);
			$table->boolean('have_experience_caring_child_with_special_needs')->nullable()->default(0);
			$table->boolean('have_experience_caring_infants')->nullable()->default(0);
			$table->boolean('have_experience_caring_twins')->nullable()->default(0);
			$table->boolean('have_experience_provide_homework_help')->nullable()->default(0);
			$table->integer('paid_child_care_experience_years')->nullable()->default(0);
			$table->text('age_groups_experience_with')->nullable()->default(null);
			$table->boolean('willing_care_for_sick_children')->nullable()->default(0);
			$table->boolean('have_special_needs_service_experience')->nullable()->default(0);
			$table->text('special_needs_service_experience')->nullable()->default(null);
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
		Schema::drop('experiences');
	}

}
