<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionPlansTable extends Migration {	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscription_plans',function($table){
			$table->increments('id');
			$table->string('name')->nullable()->default(null);
			$table->string('post_type')->nullable()->default(null);
			$table->string('amount')->nullable()->default(null);
			$table->string('duration')->nullable()->default(null);
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
		Schema::drop('subscription_plans');
	}

}