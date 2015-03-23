<?php namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Config;
use Request;
use App\Models\ListingCategory;
use Session;

class SubCategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($sName)
	{		
		$this->data[ 'catnm' ] = $sName;
		$this->data[ 'aSubCategories' ] = ListingCategory::where( 'type' , '=' , $sName )->get();
		return $this->renderView('admin.category.index');
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
							Session::put('success','Category added successfully');
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
						Session::put('success','Category added successfully');
					}
				}
			}
		}
		return response()->json( $aResp );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( $id )
	{
		$aResp[ 'success' ] = false;
		$aResp[ 'msg' ]  = "Something went wrong , Please try again";		
		if( Request::has('name') AND Request::has('type') )
		{			
			$sType = Request::get('type');
			$sName = Request::get('name');	
			$id = Request::get('id');
			$bExist = $this->isExist( $sType , $sName , $id );
			$aResp[ 'msg' ] = $sName . " is already exist";
			if( !$bExist )
			{
				$aData = Request::only( array( 'name' ) );
				$oCat = ListingCategory::find( $id );
				if( $oCat )
				{
					$oCat->type = $sType;
					$oCat->name = $sName;
					$oCat->save();
					$aResp[ 'success' ] = true;
					Session::put('success','Category saved successfully');
					unset( $aResp[ 'msg' ] );
				}				
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
	public function destroy( $id )
	{		
		if( Request::has('id') )
		{
			$id  = Request::input('id');
			$oCat = ListingCategory::find($id);
			if( $oCat )
			{
				$oCat->delete();				
				Session::put('success','Category removed successfully');				
			}
			else
			{
				Session::put('error','Something went wrong , Please try again');
			}
		}
		else
			Session::put('error','Something went wrong , Please try again');
		return response()->json( [] );
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
		if( $iCatId != 0 )
			$aCat = ListingCategory::where( 'name' , '=' , $sName )->where( 'id' , '!=' , $iCatId )->get();	
		else
			$aCat = ListingCategory::where( 'name' , '=' , $sName )->get();
		if( $aCat->count() > 0 )
		{			
			if( $sType == "Both" )
			{
				return true;
			}
			else
			{
				if( $aCat->count() > 1 )
					return true;
				else if( $aCat[0]->type == $sType )
					return true;
				else 
					return false;
			}
		}
		else 
			return false;
	}

	public function exportCategory($name)
	{
		$categories = ListingCategory::where( 'type' , '=' , $name )->get();
		$filename = "categories.csv";
		$handle = fopen($filename, 'w+');
		fputcsv($handle, array('name', 'type'));

		foreach($categories as $category) {
			$type = $name;
			if( ListingCategory::where('id','!=',$category->id)->where('name','=',$category->name)->count() )
				$type = 'Both';
			fputcsv($handle, array($category->name, $type));
		}

		fclose($handle);
		return response()->download($filename)->deleteFileAfterSend(true);
	}

	public function postImportCategory($name)
	{
		if(! Request::hasFile('file') )
			return redirect()->back()->with('error','no file recived!');
		$oFile = Request::file('file');
		$filename = $oFile->getClientOriginalName();
		$oFile = $oFile->move(base_path('uploads').'/',$filename);
		$file = file_get_contents(base_path('uploads/'.$filename));
		$data = array_map("str_getcsv", preg_split('/\r*\n+|\r+/', $file));
		unset($data[0]);
		array_values($data);
		foreach( $data AS $row )
		{
			if( ! empty( $row['0'] ) AND ! empty( $row[1] ) )
			{
				if( $row[1] == 'Deal' || $row[1] == 'Classified' || $row[1] == 'Both' )
				{
					if( $row[1] == 'Both' )
					{
						if(! ListingCategory::where('name',$row[0])->where('type','Deal')->count() )
						{
							$oCategory = new ListingCategory();
							$oCategory->name = $row[0];
							$oCategory->type = 'Deal';
							$oCategory->save();
						}
						if( ! ListingCategory::where('name',$row[0])->where('type','Classified')->count() )
						{
							$oCategory = new ListingCategory();
							$oCategory->name = $row[0];
							$oCategory->type = 'Classified';
							$oCategory->save();
						}
					}
					else
					{
						if( ! ListingCategory::where('name',$row[0])->where('type',$row[1])->count() ) {
							$oCategory = new ListingCategory();
							$oCategory->name = $row[ 0 ];
							$oCategory->type = $row[ 1 ];
							$oCategory->save ();
						}
					}
				}
			}
		}
		return redirect()->back()->with('success','Import successfull!');
	}
}
