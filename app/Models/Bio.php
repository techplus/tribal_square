<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bio extends Model{

	protected $table = "bios";
	protected $guarded = array('id');

	public function User(){
		return $this->hasOne('App\Models\User');
	}
}