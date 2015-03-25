<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Availability extends Model{

	protected $table = "availabilities";
	protected $guarded = array('id');

	public function User(){
		return hasOne('App\Model\User');
	}
}