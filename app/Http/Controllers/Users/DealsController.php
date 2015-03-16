<?php namespace App\Http\Controllers\Users;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Deal;
use Request;
use App\Models\ListingCategory;

class DealsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	 	$this->data['aDeals'] = Deal::with('ListingCategory')->where ( 'user_id' , '=' , $this->data[ 'oUser' ]->id )->get ();;
	 	return $this->renderView ( 'providers.deals.index' );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->data[ 'oDeal' ] = new Deal();
		$this->data[ 'aListingCategories' ] = ListingCategory::where ( 'type' , '=' , 'Deal' )->get ();
		return $this->renderView ( 'providers.deals.add' );
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
