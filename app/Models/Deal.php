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
	public function Owner()
	{
		return $this->belongsTo('App\Models\User','user_id');
	}
	public function DealImages()
	{
		return $this->hasMany('App\Models\DealImage','deal_id');
	}
	public function CoverPic()
	{
		$images = $this->DealImages();
		return $images->where('is_cover',1);
	}
	public function DealVideos()
	{
		return $this->hasMany('App\Models\DealVideo','deal_id');
	}
	public function Purchases()
	{
		return $this->hasMany('App\Models\Purchase','item_id');
	}
	public function AgentEarning()
	{
		return $this->belongsTo( 'App\Models\AgentEarning' , 'deal_id' );
	}
	public function scopeApproved($query)
	{
		return $query->where('is_approved_by_admin',1);
	}
	public function scopeExpired($query)
	{
		return $query->where('end_date','<',date('Y-m-d'));
	}
	public function scopeDealoftheday($query)
	{
		return $query->where('is_deal_of_the_day',1);
	}
	public function scopeFuture($query)
	{
		return $query->where('end_date','>',date('Y-m-d'));
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
			});
		});
	}
}