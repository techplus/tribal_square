<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model{

	protected $table = "shifts";
	protected $guarded = array( 'id' );

	public function Days()
	{
		return $this->belongsToMany('App\Models\Day','day_shifts','shift_id','day_id');
	}

	public function Users()
	{
		return $this->belongsToMany('App\Models\User','day_shifts','shift_id','user_id');	
	}
}