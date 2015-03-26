<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model{

	protected $table = "days";
	protected $guarded = array( 'id' );

	public function Shifts()
	{		
		return $this->belongsToMany('App\Models\Shift','day_shifts','day_id','shift_id');
	}

	public function Users()
	{
		return $this->belongsToMany('App\Models\Shift','day_shifts','day_id','user_id')->withPivot( [ 'id' , 'shift_id' , 'user_id' , 'day_id'  ] );	
	}	
}