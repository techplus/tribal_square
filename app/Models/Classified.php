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

	public function scopeApproved($query)
	{
		return $query->where('is_approved_by_admin',1);
	}
	public function scopeUsers($query,$user)
	{
		return $query->where('user_id',$user);
	}
	public function scopeTerm($query,$term)
	{
		return $query->where(function($q) use($term){
			$q->orWhere('title','LIKE',"%".$term."%")->orWhere('description','LIKE','%'.$term.'%')->orWhere('fineprint','LIKE','%'.$term.'%')->orWhereHas('ListingCategory',function($q) use( $term ){
				$q->where('name','LIKE','%'.$term."%");
			});;
		});
	}
}