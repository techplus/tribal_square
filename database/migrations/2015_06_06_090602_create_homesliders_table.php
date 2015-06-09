<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeslidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('homesliders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slidertitle')->nullable()->default(null);
			$table->string('image_path')->nullable()->default(null);
			$table->string('link')->nullable()->default(null);
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
		Schema::drop('homesliders');
	}

}
