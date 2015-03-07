<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
Use App\Models\User;
class UserType extends Model{
	use SoftDeletes;
	protected $table = "user_types";
	protected $guarded = array( 'id' );
	public function Users()
	{
		return $this->belongsToMany('User','user_usertypes','usertype_id','user_id');
	}
}