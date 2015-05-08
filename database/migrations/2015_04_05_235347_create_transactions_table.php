<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions',function(Blueprint $table){
			$table->increments('id');
			$table->enum('type',['paypal','credit_card','cheque','cash'])->default(null)->nullable();
			$table->string('email')->nullable()->default(null);
			$table->string('txn_id')->nullable()->default(null);
			$table->float('amount')->nullable()->default(null);
			$table->string('currency')->nullable()->default('USD');
			$table->nullableTimestamps();
			$table->softDeletes();
			$table->string('invoice_number')->nullable()->default(null);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactions');
	}

}
