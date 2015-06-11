<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Savesearch;
use App\Models\ListingCategory;
use Request;
use Validator;

class SavesearchController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ( Request::has ( 'user_id' ) ) 
		{
			$data = array();
			$data['user_id'] = Request::input('user_id');
			$data['keyword'] = Request::input('keyword');
			$data['location'] = Request::input('location');
			$data['category_id'] = Request::input('category_id');
			$data['type'] 		= Request::input('type');

			Savesearch::create ( $data );
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->data['aSavesearch'] = Savesearch::with ( [ 'Listingcategory' ] )->where('user_id',$id)->get();

		if( !$this->data['aSavesearch'] )
			abort(404);

		return $this->renderView('providers.searchsave.index');
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

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getSearch()
	{
		$data = Request::all();
		$aSearch = array();
		$aSearch['term'] = $data['keyword'];
		$aSearch['location'] = $data['location'];
		$aSearch['cat'] = $data['cat'] == 0 ? '' : $data['cat'];
		$aSearch['type'] = $data['type'];

		session(['search'=>$aSearch]);

		if( $data['type'] == "classified" )
			return redirect()->route('search.classified.index');
		else
			return redirect()->route('search.deals.index');
	}

}
