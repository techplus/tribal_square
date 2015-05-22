<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use App\Http\Requests\SalesagentRequest;
use Request;
use Auth;
use App\Http\Requests\ProfileRequest;




class SalesAgentController extends Controller
{
	public function index()
	{
		$this->data[ 'oUser' ] = Auth::user();

		$oUserType = Auth::user()->UserTypes()->where('user_usertypes.user_id' , '=' , $this->data['oUser']->id )->first();

		if( $oUserType )
		{
		 	$this->data[ 'oUserType' ] = $oUserType;
		}	
		return $this->renderView('agents.index');
	}

	public function update(SalesagentRequest $request, $id)
	{
		$id = Auth::user()->id;
		if( $request->hasFile('profile') )
		{
			@unlink(base_path('profile_pictures/'.$id.".png"));
			@unlink(base_path('profile_pictures/'.$id.".jpg"));
			@unlink(base_path('profile_pictures/'.$id.".jpeg"));
			$file = $request->file('profile');
			$file->move(base_path('profile_pictures'),$id.".".$file->getClientOriginalExtension());
		}
		$user = User::find($id);
		$user->firstname = $request->input('firstname');
		$user->lastname = $request->input('lastname');
		$user->email = $request->input('email');
		$password = $request->input('password');
		if( !empty( $password ) )
			$user->password = $request->input('password');
		$user->save();

		
		$paypal = $request->input('paypalid');
		if( Request::has ( 'paypalid' ) )
		{
			$update = Auth::user()->find($id); 
			$update_imei = $update->UserTypes()->where('user_usertypes.user_id','=',$id)->first(); 
			$update_imei->pivot->paypalid = $request->input('paypalid');
			$update_imei->pivot->save();

		}
		return redirect()->back()->with('success','Settings updated successfully');
	}
}