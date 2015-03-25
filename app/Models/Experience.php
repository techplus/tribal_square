<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model{

	protected $table = "experiences";
	protected $guarded = array('id');

	public function User(){
		return hasOne('App\Model\User');
	}
}