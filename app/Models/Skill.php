<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model{

	protected $table = "skills";
	protected $guarded = array('id');

	public function User(){
		return hasOne('App\Model\User');
	}
}