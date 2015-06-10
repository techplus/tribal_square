<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Savesearch extends Model {

	protected $table = "save_search";
	protected $guarded = array( 'id' );
	public function ListingCategory()
	{
		return $this->belongsTo('App\Models\ListingCategory','category_id');
	}

}
