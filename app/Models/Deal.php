<?php namespace App\Models;
Use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
class Deal extends Model{
	use SoftDeletes;
	protected $table = "deals";
	protected $guarded = array( 'id' );
}