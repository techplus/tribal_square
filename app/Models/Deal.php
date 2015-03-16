<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class Deal extends Model{
	use SoftDeletes;
	protected $table = "deals";
	protected $guarded = array( 'id' );
	public function DealImages()
	{
		return $this->hasMany('DealImage','deal_id');
	}
	public function DealVideos()
	{
		return $this->hasMany('DealVideos','deal_id');
	}
}