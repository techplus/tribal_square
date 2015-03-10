<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class ListingCategory extends Model{
	use SoftDeletes;
	protected $table = "listing_categories";
	protected $guarded = array( 'id' );
}