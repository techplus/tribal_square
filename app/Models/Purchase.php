<?php namespace App\Models;

use Eloquent;

class Purchase extends Eloquent
{
	protected $guarded = array('id');

	public function Transaction()
	{
		return $this->belongsTo('App\Models\Transaction','order_id');
	}

	public function Deal()
	{
		return $this->belongsTo('App\Models\Deal','item_id');
	}
}