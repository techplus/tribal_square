<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class UserType extends Model{
	use SoftDeletes;
	protected $table = "user_types";
	protected $guarded = array( 'id' );
	public function Users()
	{
		return $this->belongsToMany('App\Models\User','user_usertypes','user_type_id','user_id');
	}
}