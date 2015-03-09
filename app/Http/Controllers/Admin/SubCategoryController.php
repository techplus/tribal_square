<?php namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Config;
use Request;
use App\Models\ListingCategory;

class SubCategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($sName)
	{		
		$this->data[ 'cat' ] = $sName;
		$this->data[ 'aSubCategories' ] = ListingCategory::where( 'type' , '=' , $sName )->get();
		return $this->renderView('admin.category.index');
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
		if( Request::has('name') )
		{

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
	public function update( $id )
	{
		if( $id )
		{
			//$aData = Request::input( array( 'only' => [ 'name' ] ) );
		}
		return redirect()->back();
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

	public function getCatType()
	{
		$aResp = array( 'success' => false );
		if( Request::has('name') )
		{
			$sName = Request::input('name');
			$aCategories = ListingCategory::where('name','=',$sName)->get();
			if( $aCategories->count() == 1 )
			{
				$aResp[ 'success' ] = true;
 				$aResp[ 'type' ] = $aCategories[0]->type;
			}
			else if( $aCategories->count() == 2 )
			{
				$aResp[ 'success' ] = true;
				$aResp[ 'type' ] = "Both";
			}			
		}
		return response()->json($aResp);
	}
}
