<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments',function($table){
			$table->increments('id');
			$table->string('txn_id')->nullable()->default(null);
			$table->integer('user_id')->default(0);
			$table->string('subscriber_id')->nullable()->default(null);
			$table->integer('subscription_id')->nullable()->default(null);
			$table->string('amount')->nullbale()->default(null);
			$table->string('duration')->nullbale()->default(null);
			$table->string('post_type')->nullbale()->default(null);
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
		Schema::drop('payments');
	}

}
