<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Auth;

class ProvidersController extends Controller
{
	public function index ()
	{
		return redirect ()->to ( 'posts' );
	}

	public function show($id)
	{
		return $this->renderView('providers.profile');
	}

	public function update(ProfileRequest $request,$id)
	{
		$id = Auth::user()->id;
		if( $request->hasFile('profile') )
		{
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
		return redirect()->back()->with('success','profile updated successfully');
	}
}