<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class Classified extends Model{
	use SoftDeletes;
	protected $table = "classifieds";
	protected $guarded = array( 'id' );
	public function ListingCategory()
	{
		return $this->belongsTo('App\Models\ListingCategory','category_id');
	}
	public function ClassifiedImages()
	{
		return $this->hasMany('App\Models\ClassifiedImage','classified_id');
	}
	public function ClassifiedVideos()
	{
		return $this->hasMany('App\Models\ClassifiedVideo','classified_id');
	}
}