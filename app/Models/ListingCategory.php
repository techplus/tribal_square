<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class ListingCategory extends Model{
	use SoftDeletes;
	protected $table = "listing_categories";
	protected $guarded = array( 'id' );

	public function Classifieds()
	{
		return $this->hasMany('App\Models\Classified','category_id');
	}

	public function scopeDeals($query)
	{
		return $query->where('type','Deal');
	}

	public function scopeClassified($query)
	{
		return $query->where('type','Classified');
	}
}