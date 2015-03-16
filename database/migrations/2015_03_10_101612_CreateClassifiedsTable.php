<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassifiedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classifieds',function($table){
			$table->increments('id');
			$table->string('title')->nullable()->default(null);
			$table->float('price')->default(0);
			$table->integer('user_id')->default(0);
			$table->integer('category_id')->default(0);
			$table->text('description')->nullbale()->default(null);
			$table->string('condition')->nullbale()->default(null);
			$table->string('manufacture')->nullbale()->default(null);
			$table->string('model_number')->nullbale()->default(null);
			$table->string('size')->nullbale()->default(null);
			$table->text('fineprint')->nullbale()->default(null);
			$table->string('location')->nullable()->default(null);
			$table->string('location2')->nullable()->default(null);
			$table->string('street1')->nullable()->default(null);
			$table->string('street2')->nullable()->default(null);
			$table->string('state')->nullable()->default(null);
			$table->string('city')->nullable()->default(null);
			$table->string('country')->nullable()->default(null);
			$table->string('pin')->nullable()->default(null);	
			$table->string('lat')->nullable()->default(null);
			$table->string('long')->nullable()->default(null);
			$table->string('website')->nullable()->default(null);
			$table->string('phone')->nullable()->default(null);											
			$table->string('mobile')->nullable()->default(null);
			$table->string('email')->nullable()->default(null);											
			$table->string('contact_name')->nullable()->default(null);
			$table->boolean('can_phone')->nullable()->default(0);
			$table->boolean('can_text')->nullable()->default(0);		
			$table->boolean('avail_for_other_services')->nullable()->default(0);	
			$table->string('languages')->nullable()->default(null);		
			$table->boolean('is_approved_by_admin')->nullable()->default(0);
			$table->text('language_spoken')->nullbale()->default(null);	
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
		Schema::drop('classifieds');
	}

}
