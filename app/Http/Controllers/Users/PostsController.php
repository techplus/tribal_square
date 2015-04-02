<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Classified;
use App\Models\ListingCategory;
use App\Models\ClassifiedImage;
use Auth;
use Request;

class PostsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index ()
	{
		$this->data[ 'aPostings' ] = Classified::withTrashed()->with ( [ 'Listingcategory' ] )->where ( 'user_id' , '=' , $this->data[ 'oUser' ]->id )->get ();
		return $this->renderView ( 'providers.posting.index' );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create ()
	{
		$this->data[ 'oPost' ] = new Classified();
		$this->data[ 'aCategories' ] = Listingcategory::where ( 'type' , '=' , 'Classified' )->get ();

		return $this->renderView ( 'providers.posting.add' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store ()
	{
		$aResp = array ( 'success' => FALSE );
		if ( Request::has ( 'category_id' ) AND Request::has ( 'location' ) ) {
			$aQuery = Request::only ( [ 'category_id' , 'location' ] );
			$aQuery['user_id'] = Auth::user()->id;
			$oClassified = Classified::create ( $aQuery );
			if ( $oClassified )
				return response ()->json ( $oClassified->toArray () );
		}

		return response ()->json ( $aResp , 500 );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show ( $id )
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit ( $id )
	{
		$this->data[ 'aCategories' ] = Listingcategory::where ( 'type' , '=' , 'Classified' )->get ();
		$this->data[ 'oPost' ] = Classified::with ( [ 'ClassifiedImages' , 'ClassifiedVideos' ] )->find ( $id );

		if ( ! $this->data[ 'oPost' ] )
			return abort ( 404 );

		return $this->renderView ( 'providers.posting.edit' );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update ( $id )
	{
		$aResp = array ( 'success' => FALSE );
		$oPost = Classified::find ( $id );
		if ( ! $oPost )
			return response ()->json ( $aResp );

		$aUpdateData = Request::only ( [
			'email' , 'title' , 'price' , 'description' , 'condition' ,'category_id','location','fineprint','street1','street2','language_spoken',
			'location2' , 'manufacture' , 'model_number' , 'size' , 'city' , 'country' , 'state' , 'pin' , 'avail_for_other_services' , 'phone' , 'contact_name' , 'lat' , 'long'
		] );
		if( Request::has('is_cover') )
		{
			ClassifiedImage::where('id',Request::input('is_cover'))->update(['is_cover'=>1]);
		}
		if( ! Request::has('can_phone') )
			$aUpdateData['can_phone'] = 0;
		else
			$aUpdateData['can_phone'] = 1;
		if( ! Request::has('can_text') ) 
			$aUpdateData['can_text'] = 0;
		else
			$aUpdateData['can_text'] = 1;
		Classified::where('id',$id)->update($aUpdateData);
		return response ()->json ( Classified::find ( $id )->toArray () );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy ( $id )
	{
		$oPost = Classified::find ( $id );
		if ( ! $oPost )
			return response ()->json ( [ 'success' => FALSE ] );

		$images = $oPost->ClassifiedImages()->get();

		// we don't remove file for future restore purpose
		foreach( $images AS $oimage )
			$oimage->delete();

		$oPost->delete ();

		return response ()->json ( [ 'success' => TRUE ] );
	}

}
