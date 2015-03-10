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
		$aResp['success'] = false;
		$aResp['msg'] = "Something went wrong , please try again";
		if( Request::has('name') AND Request::has('type') )
		{			
			$sType = Request::get('type');
			$sName = Request::get('name');
			if( $sType == "Both" )
			{							
				$bExist = $this->isExist( $sType , $sName );
				$aResp[ 'msg' ] = $sName . " is already exist";
				if( !$bExist )
				{
					$aCats = Config::get('categories');
					foreach( $aCats as $cat )
					{
						$aData = array();
						$aData[ 'type' ] = $cat;
						$aData[ 'name' ] = Request::input('name');
						$oCat = ListingCategory::create( $aData );
						if( $oCat )
						{
							$aResp['success'] = true;
						}
					}
					$aResp[ 'msg' ] = "";
				}
			}
			else
			{
				$bExist = $this->isExist( $sType , $sName );
				$aResp[ 'msg' ] = $sName . " is already exist";
				if( !$bExist )
				{
					$aData = Request::only( 'type' , 'name' );
					$oCat = ListingCategory::create( $aData );
					if( $oCat )
					{
						$aResp['success'] = true;
					}
				}
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
		return response()->json(Request::all());
		//return redirect()->back();
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
	private function isExist( $sType , $sName , $iCatId  = 0 )
	{
		$aCat = ListingCategory::where( 'name' , '=' , $sName );
		if( $aCat->count() > 0 )
		{			
			if( $sType == "Both" )
			{
				return false;
			}
			else
			{
				if( $aCat->count() > 1 )
					return false;
				else if( $aCat[0]->type == $sType )
					return false;
				else 
					return true;
			}
		}
		else 
			return true;
	}
}
