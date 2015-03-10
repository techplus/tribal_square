<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listing_categories',function($table){
			$table->increments('id');
			$table->string('name')->nullable()->default(null);
			$table->enum('type',[ 'Classified' , 'Deal' ])->nullable()->default(null);
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
		Schema::drop('listing_categories');
	}

}
