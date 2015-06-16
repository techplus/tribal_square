<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
class Content extends Model{
	// use SoftDeletes;
	protected $table = "contents";
	protected $guarded = array( 'id' );

	
}
