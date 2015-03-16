<?php namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Models\Language;

class LanguagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$oLanguage = Language::where('name','LIKE','%'.Request::input('term','')."%")->lists('name');
		return response()->json($oLanguage);
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
		if( ! Request::has('name') )
			return response()->json(['error'=>'name is required'],500);

		$language = Language::where('name',Request::input('name'))->first();
		if( $language )
			return response()->json(['success']);

		$oLanguage = Language::create(['name'=>Request::input('name')]);
		return $oLanguage->toArray();
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

}
