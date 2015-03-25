<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model{

	protected $table = "days";
	protected $guarded = array( 'id' );

	public function Shifts()
	{		
		return belongsToMany('App\Models\Shift','day_shifts','day_id','shift_id');
	}

	public function Users()
	{
		return belongsToMany('App\Models\Shift','day_shifts','day_id','user_id');	
	}
}