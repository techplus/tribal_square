<?php namespace App\Models;
/**
 * Created by PhpStorm.
 * User: Temp
 * Date: 21-May-15
 * Time: 2:32 PM
 */
use Illuminate\Database\Eloquent\Model;
class AgentEarning extends Model{

	protected $table = "agent_earnings";
	protected $guarded = array('id');

	public function User()
	{
		return $this->belongsTo( 'App\Models\User' , 'agent_id' );
	}

	public function Deal()
	{
		return $this->belongsTo( 'App\Models\Deal' , 'deal_id' );
	}

	public function Transaction()
	{
		return $this->belongsTo( 'App\Models\Transaction' , 'buyer_id' );
	}
}