<?php namespace App\Http\Controllers;

use App\Models\ListingCategory;
use DB;
use Request;
use App\Models\Classified;
class ClassifiedsController extends Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['subcategories'] = ListingCategory::classified()->get();
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

		$oDealsBuilder = Classified::approved()->with(['ClassifiedImages'=>function($q){
			$q->where('is_cover',1);
		},'ListingCategory']);

		$this->data['cat_id'] = 0;
		if( ! empty( $aSearch['term'] ) )
			$oDealsBuilder = $oDealsBuilder->term($aSearch['term']);
		if( ! empty( $aSearch['location'] ) )
			$oDealsBuilder = $oDealsBuilder->where(function($q)use( $aSearch ){
				if( isset( $aSearch['location']) AND !empty( $aSearch['location'] ) ) {
					$location_parts = explode( "," , $aSearch[ 'location' ] );
					$q->where(DB::raw('1'));
					foreach( $location_parts AS $p )
						$q->orWhere( 'location2' , 'LIKE' , '%' . $p . '%' );
				}
			});
		if( !empty( $aSearch['cat'] ) )	{
			$oDealsBuilder = $oDealsBuilder->whereHas('ListingCategory',function($q)use($aSearch){
				$q->where('id',$aSearch['cat']);				
			});
			$this->data['cat_id'] = $aSearch['cat'];
		}	

		$classifieds = $oDealsBuilder->get();
		$aViewData = array();
		foreach( $classifieds AS $classified)
		{
			$aViewData[$classified->ListingCategory->name][] = $classified;
		}
		$this->data['classifieds'] = $aViewData;
		return $this->renderView('front.search_classified');
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
		$classified = Classified::with(['ClassifiedImages','ListingCategory'])->find($id);
		if( ! $classified )
			return abort(404);

		$this->data['classified'] = $classified;
		$this->data['layout'] = "layouts.front";

		$aSearch = session('search');

		$oDealsBuilder = Classified::approved()->with( [ 'CoverPic' ] )->orderBy('updated_at','DESC');

		$this->data['cat_id'] = 0;
		if( ! empty( $aSearch['term'] ) )
			$oDealsBuilder = $oDealsBuilder->term($aSearch['term']);
		if( ! empty( $aSearch['location'] ) )
			$oDealsBuilder = $oDealsBuilder->where('location2','LIKE','%'.$aSearch['location'].'%');
		if( !empty( $aSearch['cat'] ) )	{
			$oDealsBuilder = $oDealsBuilder->whereHas('ListingCategory',function($q)use($aSearch){
				$q->where('id',$aSearch['cat']);				
			});
			$this->data['cat_id'] = $aSearch['cat'];
		}			

		$this->data['aLatestPosts'] = $oDealsBuilder->take(5)->get();
		return $this->renderView('front.classified_full_view');
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
