<?php namespace App\Models;

use Eloquent;

/**
 * Class Payment
 *
 * @package App\Models
 */
class Payment extends Eloquent
{
	/**
	 * @var string
	 */
	protected $table = 'payments';

	/**
	 * @var array
	 */
	protected $guarded = ['id'];

	/**
	 * @return mixed
	 */
	public function User()
	{
		return $this->belongsTo('App\Models\User','user_id');
	}
}