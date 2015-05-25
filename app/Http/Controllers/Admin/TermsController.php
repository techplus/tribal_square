<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\AddAdminRequest;
use App\Models\UserType;
use App\Models\Content;
use Validator;
use Request;
use Mail;
use Session;

class TermsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data['aContentTerms'] = Content::find(2);

		//var_dump($this->data['aContent']);

		return $this->renderView('admin.admins.terms');
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
	public function store()
	{
		
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
		Content::where('id',$id)->update(Request::except(['_token','_method']));
		
		return redirect()->back()->with('success','Terms content updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
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
