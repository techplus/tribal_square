<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class ClassifiedVideo extends Model{
	use SoftDeletes;
	protected $table = "classified_videos";
	protected $guarded = array( 'id' );
}