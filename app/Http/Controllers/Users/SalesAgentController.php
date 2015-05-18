<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use App\Http\Requests\SalesagentRequest;
use Request;
use Auth;


class SalesAgentController extends Controller
{
	public function index()
	{
		$this->data[ 'oUser' ] = Auth::user();

		$$oUser = Auth::user()->UserTypes()->where('user_usertypes.user_id' , '=' , $this->data['oUser']->id )->first();

		if( $$oUser )
		{
		 	$this->data[ '$oUser' ] = $$oUser;
		}	
		return $this->renderView('agents.index');
	}

	public function update(SalesagentRequest $request, $id)
	{
		$id = Auth::user()->id;
		
		$paypal = $request->input('paypalid');
		
		if( Request::has ( 'paypalid' ) )
		{
			$update = Auth::user()->find($id); 
			$update_imei = $update->UserTypes()->where('user_usertypes.user_id','=',$id)->first(); 
			$update_imei->pivot->paypalid = $request->input('paypalid');
			$update_imei->pivot->save();

		}
		
		return redirect()->back()->with('success','Paypal ID updated successfully');
	}
}