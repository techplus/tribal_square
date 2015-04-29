<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class SubscriptionPlan extends Model{
	use SoftDeletes;
	protected $table = "subscription_plans";
	protected $guarded = array( 'id' );
}