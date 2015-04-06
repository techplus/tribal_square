<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases',function(Blueprint $table){
			$table->increments('id');
			$table->integer('item_id');
			$table->integer('order_id');
			$table->integer('user_id');
			$table->string('email')->nullable()->default(null);
			$table->enum('item_type',['deal','classified','babysitter'])->nullable()->default('classified');
			$table->integer('quantity')->default(0);
			$table->float('amount')->nullable()->default(null);
			$table->string('currency')->nullable()->default('USD');
			$table->nullableTimestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchases');
	}

}
