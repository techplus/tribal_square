<?php namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Session;


class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if( ! Request::has('type') )
			abort(404);

		if( Session::has('search') )
		{
			$aSearch = Session::get('search');
			
				// $aSearch['term'] = "";
				// $aSearch['location'] = "";
					
			$aSearch['type'] = Request::get('type','deals');
			$aSearch['cat'] = "";

			//dd($aSearch);
			Session::put( 'search' , $aSearch );
		}		

		if( Request::get('type') == "classified" )
			return redirect()->route('search.classified.index');
		else
			return redirect()->route('search.deals.index');
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
		if( ! Request::has('type') )
			abort(404);

		if( Session::has('search') )
		{
			$aSearch = Session::get('search');
			$aSearch['type'] = Request::get('type','deals');
			$aSearch['cat'] = $id;			
		}	
		else{
			$aSearch['type'] = Request::get('type','deals');
			$aSearch['cat'] = $id;
		}	
		Session::put( 'search' , $aSearch );

		if( Request::get('type') == "classified" )
			return redirect()->route('search.classified.index');
		else
			return redirect()->route('search.deals.index');
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
