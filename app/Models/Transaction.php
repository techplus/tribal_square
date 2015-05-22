<?php namespace App\Models;

use Eloquent;
class Transaction extends Eloquent
{
	protected $guarded = array('id');

	public function Purchases()
	{
		return $this->hasMany('App\Models\Purchases','order_id');
	}
	public function AgentEarning()
	{
		return $this->belongsTo( 'App\Models\AgentEarning' , 'buyer_id' );
	}
}