<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class Deal extends Model{
	use SoftDeletes;
	protected $table = "deals";
	protected $guarded = array( 'id' );
	public function ListingCategory()
	{
		return $this->belongsTo('App\Models\ListingCategory','category_id');
	}
	public function DealImages()
	{
		return $this->hasMany('App\Models\DealImage','deal_id');
	}
	public function DealVideos()
	{
		return $this->hasMany('App\Models\DealVideo','deal_id');
	}
}