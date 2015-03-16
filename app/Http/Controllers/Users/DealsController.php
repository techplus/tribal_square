<?php namespace App\Http\Controllers\Users;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Deal;
use Request;
use App\Models\ListingCategory;
use App\Models\DealImage;
use Auth;

class DealsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	 	$this->data[ 'aDeals'  ] = Deal::with ( [ 'Listingcategory' ] )->where ( 'user_id' , '=' , $this->data[ 'oUser' ]->id )->get ();;
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
		$aResp = array ( 'success' => FALSE );
		$aData = Request::only ( [
			'email' , 'title' , 'original_price' , 'new_price' , 'discount_percentage' , 'start_date' , 'end_date' , 'description' , 'available_stock' , 'fineprint' , 'category_id' , 'location' , 'street1' , 'street2'
			, 'city' , 'country' , 'state' , 'pin' , 'website' , 'contact' , 'lat' , 'long'
		] );
		$aData[ 'start_date' ] = preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/','$3-$1-$2', $aData[ 'start_date' ] );
		$aData[ 'end_date' ] = preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/','$3-$1-$2', $aData[ 'end_date' ] );
		$aData[ 'user_id' ] = Auth::user()->id;		
		$oDeal = Deal::create( $aData );
		if( $oDeal )
			return response()->json ( $oDeal -> toArray() );
		return response ()->json ( $aResp , 500 );
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
		$this->data[ 'aListingCategories' ] = Listingcategory::where ( 'type' , '=' , 'Deal' )->get ();
		$this->data[ 'oDeal' ] = Deal::with ( [ 'DealImages' , 'DealVideos' ] )->find ( $id );

		if ( ! $this->data[ 'oDeal' ] )
			return abort ( 404 );

		return $this->renderView ( 'providers.deals.edit' );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$aResp = array ( 'success' => FALSE );
		$oDeal = Deal::find ( $id );
		if ( ! $oDeal )
			return response ()->json ( $aResp );

		$aUpdateData = Request::only ( [
			'email' , 'title' , 'original_price' , 'new_price' , 'discount_percentage' , 'start_date' , 'end_date' , 'description' , 'available_stock' , 'fineprint' , 'category_id' , 'location' , 'street1' , 'street2'
			, 'city' , 'country' , 'state' , 'pin' , 'website' , 'contact' , 'lat' , 'long'
		] );
		$aUpdateData[ 'start_date' ] = preg_replace( '/(\d{2})\/(\d{2})\/(\d{4})/' , '$3-$1-$2' , $aUpdateData[ 'start_date' ] );
		$aUpdateData[ 'end_date' ] = preg_replace( '/(\d{2})\/(\d{2})\/(\d{4})/' , '$3-$1-$2' , $aUpdateData[ 'end_date' ] );
		if( Request::has ( 'is_cover' ) )
		{
			DealImage::where( 'id' , Request::input( 'is_cover' ) )->update( [ 'is_cover' => 1 ] );
		}
		Deal::where( 'id' , $id )->update( $aUpdateData );
		return response ()->json ( Deal::find ( $id )->toArray () );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$oDeal = Deal::find ( $id );
		if ( ! $oDeal )
			return response ()->json ( [ 'success' => FALSE ] );

		// remove deal-images
		$aImages = $oDeal->DealImages()->get();
		if( $aImages->count() > 0 )
		{
			// we don't remove file for future restore purpose
			foreach( $aImages AS $oimage )
				$oimage->delete();
		}	

		// remove deal-videos
		$aVideos = $oDeal->DealVideos()->get();
		if( $aVideos->count() > 0 )
		{			
			// we don't remove file for future restore purpose
			foreach( $aVideos AS $oVideo )
				$oVideo->delete();
		}
		
		// remove deal
		$oDeal->delete ();

		return response ()->json ( [ 'success' => TRUE ] );
	}

}
