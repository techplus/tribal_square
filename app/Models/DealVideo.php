<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class DealVideo extends Model{
	use SoftDeletes;
	protected $table = "deal_videos";
	protected $guarded = array( 'id' );
	public function Deal()
	{
		return $this->belongsTo('App\Models\Deal');
	}
}