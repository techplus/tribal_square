<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentEarningsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agent_earnings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('agent_id')->nullable()->default(0);
			$table->string('buyer_id',255)->nullable()->default(null);
			$table->integer('deal_id')->nullable()->default(0);
			$table->float('actual_purchase_price')->nullable()->default(0);
			$table->float('commission_rate')->nullable()->default(0);
			$table->float('amount_earned')->nullable()->default(0);
			$table->boolean('has_paid_out')->nullable()->default(0);
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
		Schema::drop('agent_earnings');
	}

}
