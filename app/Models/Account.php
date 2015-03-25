<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model{

	protected $table = "accounts";
	protected $guarded = array('id');

	public function User(){
		return hasOne('App\Model\User');
	}
}