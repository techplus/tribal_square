<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class Classified extends Model{
	use SoftDeletes;
	protected $table = "classified";
	protected $guarded = array( 'id' );
}