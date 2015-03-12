<?php namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Models\Classified;
use App\Models\ListingCategory;
use Auth;
use Request;

class PostsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		$this->data[ 'aPostings' ] = Classified::with( [ 'Listingcategory' ] )->where( 'user_id' , '=' , $this->data['oUser']->id )->get();
		return $this->renderView('providers.posting.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->data[ 'oPost' ] = [];
		$this->data[ 'aCategories' ] = Listingcategory::where( 'type' , '=' , 'Classified' )->get();
		return $this->renderView( 'providers.posting.add' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$aResp = array( 'success' => false );
		if( Request::has( 'category_id' ) AND Request::has( 'location' ) )
		{
			$aQuery = Request::only( [ 'category_id' , 'location' ] );
			$oClassified = Classified::create( $aQuery );
			if( $oClassified )
			{
				$aResp[ 'success' ] = true;
				$aResp[ 'id' ] = $oClassified->id;
			}
		}
		return response()->json( $aResp );
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
		$this->data['oPost'] = Classified::with( [ 'ClassifiedImages' , 'ClassifiedVideos' ] )->where( 'id' , '=' , $id )->first();
		return $this->renderView('providers.posting.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$aResp = array( 'success' => false );
		if( $id )
		{
			if( $currentIndex == 1 )
			{
				
			}
			else if( $currentIndex == 2 )
			{
				
			}
			else if( $currentIndex == 3 )
			{

			}
		}
		return response()->json( $aResp );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
			$oPost = Classified::find($id);
			if( $oPost )
				return response()->json( [ 'success' => false ] );
			$oPost->delete();
			return response()->json( [ 'success' => true ] );
	}

}
