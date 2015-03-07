<?php
Use Illuminate\Database\Eloquent\SoftDeletes;
class UserType extends Model{
	protected $table = "user_types";
	protected $guarded = array( 'id' );
	public function Users()
	{
		return $this->belongsToMany('App\Model\User','user_usertypes','usertype_id','user_id');
	}
}