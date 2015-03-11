<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class ClassifiedImage extends Model{
	use SoftDeletes;
	protected $table = "classified_images";
	protected $guarded = array( 'id' );
	public function Classified()
	{
		return $this->belongsTo('App\Models\Classified');
	}
}