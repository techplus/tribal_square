<?php namespace App\Http\Controllers;

use App\Models\ListingCategory;
use Request;
use App\Http\Controllers\Controller;
use App\Models\Deal;
class DealsController extends Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['categories'] = ListingCategory::Deals()->get();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aSearch = session('search');
		$oDealsBuilder = Deal::approved()->future()->with(['DealImages'=>function($q){
			$q->where('is_cover',1);
		}]);
		if( ! empty( $aSearch['term'] ) )
			$oDealsBuilder = $oDealsBuilder->term($aSearch['term']);
		if( ! empty( $aSearch['location'] ) )
			$oDealsBuilder = $oDealsBuilder->where('location','LIKE','%'.$aSearch['location'].'%');

		$this->data['oDeals'] = $oDealsBuilder->get();
		return $this->renderView('front.search_deals');
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
		$deal = Deal::with('DealImages')->find($id);
		if( ! $deal )
			return abort(404);
		$this->data['deal'] = $deal;
		return $this->renderView('front.deal_full_view');
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
