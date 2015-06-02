<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\AddAdminRequest;
use App\Models\UserType;
use Illuminate\Support\Facades\DB;
use Validator;
use Request;
use Mail;

class AdminsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data['admins'] = User::whereHas('UserTypes',function($q){
			$q->where('name','Admin');
		})->get();
		return $this->renderView('admin.admins.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->renderView('admin.admins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AddAdminRequest $request)
	{
		$data = $request->all();
		$user = User::create($data);
		$role = UserType::where('name','Admin')->first();
		$user->UserTypes()->attach($role->id);
		//send email to user
		Mail::send('emails.admin.admin_added', $data, function($message) use($data)
		{
			$message->to($data['email'],$data['firstname']." ".$data['lastname'])->subject('Welcome!');
		});
		return redirect()->route('admin.administrators.index')->with('success','Admin Added Successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['user'] = User::find($id);
		if( ! $this->data['user'])
			return abort(404);
		return $this->renderView('admin.admins.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
			'password'=> 'required|confirmed'
		];
		$validator = Validator::make(Request::all(),$rules);
		if( $validator->fails() )
			return redirect()->back()->withErrors($validator)->withInput(Request::all());
		$user = User::find($id);
		$user->password = Request::input('password');
		$user->save();
		return redirect()->route('admin.administrators.index')->with('success','Password changed successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		if( $user )
		{
			$user->forceDelete();
			DB::table('user_usertypes')->where('user_id',$id)->delete();
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function settings()
	{
		$this->data['admins'] = User::whereHas('UserTypes',function($q){
			$q->where('name','Admin');
		})->get();
		return $this->renderView('admin.admins.index');
	}

}
