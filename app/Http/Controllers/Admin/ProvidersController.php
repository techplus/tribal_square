<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Request;

class ProvidersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aUsers = User::whereHas( 'UserTypes' , function($q){
			$q->where( 'name' , 'Providers' );
		} )->get();

		$this->data[ 'aUsers' ] = $aUsers;
		return $this->renderView('admin.providers.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		$user = User::find($id);
		return view('admin.providers.edit',['user'=>$user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Request::except(['_method']);
		if( empty($data['password']) )
			unset($data['password']);
		else
			$data['password'] = bcrypt($data['password']);
		User::where('id',$id)->update($data);
		return redirect()->back()->with('success','Provider has been updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$oUser = User::find( $id );
		if ( !$oUser )
			return response()->json( array( 'error' => 'can\'t find user' ) , 500 );

		$oUser->delete();
		return response()->json( [ 'success' => true ] );
	}

}
