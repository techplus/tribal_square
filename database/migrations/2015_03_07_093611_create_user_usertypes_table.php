<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUsertypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_usertypes',function($table){
			$table->increments('id');
			$table->integer('user_id')->nullable()->default(0);
			$table->integer('user_type_id')->nullable()->default(0);
			$table->integer('last_step')->nullable()->default(1);
			$table->boolean('is_approved_by_admin')->nullable()->default(0);
			$table->integer('subscription_plan_id')->nullbale()->default(0);
			$table->float('amount')->nullbale()->default(0);
			$table->string('duration')->nullable()->default(null);
			$table->boolean('has_paid')->nullable()->default(0);
			$table->string('refferal_code',10)->nullable()->default(null);
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
		Schema::drop('user_usertypes');
	}

}
