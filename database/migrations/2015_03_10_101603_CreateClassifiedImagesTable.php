<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassifiedImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classified_images',function($table){
			$table->increments('id');
			$table->integer('classified_id')->default(0);
			$table->string('image_path')->nullable()->default(null);
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
		Schema::drop('classified_images');
	}

}
