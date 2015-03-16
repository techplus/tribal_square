<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deals',function($table){
			$table->increments('id');
			$table->string('title')->nullable()->default(null);
			$table->integer('user_id')->default(0);
			$table->integer('category_id')->default(0);
			$table->date('start_date')->nullable()->default(null);
			$table->date('end_date')->nullable()->default(null);
			$table->float('original_price')->default(0);
			$table->float('new_price')->default(0);
			$table->integer('discount_percentage')->default(0);
			$table->text('description')->nullbale()->default(null);
			$table->integer('available_stock')->default(0);
			$table->text('fineprint')->nullbale()->default(null);
			$table->string('location')->nullable()->default(null);
			$table->string('street1')->nullable()->default(null);
			$table->string('street2')->nullable()->default(null);
			$table->string('state')->nullable()->default(null);
			$table->string('city')->nullable()->default(null);
			$table->string('country')->nullable()->default(null);
			$table->string('pin')->nullable()->default(null);
			$table->string('lat')->nullable()->default(null);
			$table->string('long')->nullable()->default(null);
			$table->string('website')->nullable()->default(null);
			$table->string('email')->nullable()->default(null);
			$table->string('contact')->nullable()->default(null);
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
		Schema::drop('deals');
	}

}
