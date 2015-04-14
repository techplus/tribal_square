<?php namespace App\Http\Controllers;

use App\Models\ListingCategory;
use Request;
use DB;
use App\Models\Deal;

class DealsController extends Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['subcategories'] = ListingCategory::Deals()->get();
		$this->data['aSearch'] = session('search');
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

		$this->data['cat_id'] = 0;
		if( ! empty( $aSearch['term'] ) )
			$oDealsBuilder = $oDealsBuilder->term($aSearch['term']);
		if( ! empty( $aSearch['location'] ) )
			$oDealsBuilder = $oDealsBuilder->where(function($q)use( $aSearch ){
				if( isset( $aSearch['location']) AND !empty( $aSearch['location'] ) ) {
					$location_parts = explode( "," , $aSearch[ 'location' ] );
					$q->where(DB::raw('1'));
					foreach( $location_parts AS $p )
						$q->orWhere( 'location' , 'LIKE' , '%' . $p . '%' );
				}
			});
		if( !empty( $aSearch['cat'] ) )	{
			$oDealsBuilder = $oDealsBuilder->whereHas('ListingCategory',function($q)use($aSearch){
				$q->where('id',$aSearch['cat']);
			});
			$this->data['cat_id'] = $aSearch['cat'];
		}
		
		$oLatestDealsBuilder = $oDealsBuilder;
		$this->data['oDeals'] = $oDealsBuilder->get();
		$this->data['aLatestDeals'] = $oLatestDealsBuilder->with( [ 'CoverPic' ] )->orderBy('updated_at','DESC')->take(5)->get();
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
		$this->data['layout'] = 'layouts.front';

		$aSearch = session('search');
		$oLatestDealsBuilder = Deal::approved()->future()->with( [ 'CoverPic' ] )->orderBy('updated_at','DESC');

		$this->data['cat_id'] = 0;
		if( ! empty( $aSearch['term'] ) )
			$oLatestDealsBuilder = $oLatestDealsBuilder->term($aSearch['term']);
		if( ! empty( $aSearch['location'] ) )
			$oLatestDealsBuilder = $oLatestDealsBuilder->where('location','LIKE','%'.$aSearch['location'].'%');		
		if( !empty( $aSearch['cat'] ) )	{
			$oLatestDealsBuilder = $oLatestDealsBuilder->whereHas('ListingCategory',function($q)use($aSearch){
				$q->where('id',$aSearch['cat']);
			});
			$this->data['cat_id'] = $aSearch['cat'];
		}
				
		$this->data['aLatestDeals'] = $oLatestDealsBuilder->take(5)->get();	

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
