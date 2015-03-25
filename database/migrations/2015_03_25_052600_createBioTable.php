<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bios',function($table){
			$table->increments('id');
			$table->integer('user_id')->nullable()->default(null);
			$table->string('title')->nullable()->default(null);
			$table->text('experience')->nullable()->default(null);
			$table->boolean('have_own_car')->nullable()->default(0);
			$table->boolean('comfortable_with_pets')->nullable()->default(0);
			$table->boolean('do_smoke')->nullable()->default(0);
			$table->float('average_rate_from')->nullable()->default(0);
			$table->float('average_rate_to')->nullable()->default(0);
			$table->float('increase_rate_for_each_child')->nullable()->default(0);
			$table->integer('miles_from_home')->nullable()->default(0);
			$table->integer('no_of_childrens_comfortable_with')->nullable()->default(1);	
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
		Schema::drop('bios');
	}

}
