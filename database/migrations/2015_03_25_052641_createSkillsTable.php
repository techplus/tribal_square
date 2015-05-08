<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skills',function($table){
			$table->increments('id');
			$table->integer('user_id')->nullable()->default(0);
			$table->text('languages_spoken')->nullable()->default(null);
			$table->string('reference_name')->nullable()->default(null);
			$table->string('reference_relationship')->nullable()->default(null);
			$table->string('reference_name2')->nullable()->default(null);
			$table->string('reference_relationship2')->nullable()->default(null);
			$table->text('homework_help')->nullable()->default(null);
			$table->text('additional_services')->nullable()->default(null);
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
		Schema::drop('skills');
	}

}
