<?php namespace App\Http\Controllers\Users;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use File;
use App\Models\ClassifiedImage;
use App\Models\DealImage;
class ImagesController extends Controller {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($classified)
	{
		if( ! Request::hasFile('file') )
			return response()->json(['error'=>'File not received!'],500);

		$oFile = Request::file('file');
		$filename = $oFile->getClientOriginalName();
		$path = base_path('uploads').'/';
		$counter = 1;
		while( File::exists($path.$filename) )
			$filename = pathinfo($oFile->getClientOriginalName(),PATHINFO_FILENAME)."_".$counter++.".".pathinfo($oFile->getClientOriginalName(),PATHINFO_EXTENSION);
			
		$oFile->move(base_path('uploads'),$filename);
		
		if( Request::segment(1) == "deals" )
		{
			$aFileData = array('deal_id'=>$classified,'image_path'=>url('uploads/'.$filename));
			$oFile = DealImage::create($aFileData);
		}
		else if( Request::segment(1) == "posts" )
		{
			$aFileData = array('classified_id'=>$classified,'image_path'=>url('uploads/'.$filename));
			$oFile = ClassifiedImage::create($aFileData);
		}
		else
			return response()->json(['error'=>'Something went wrong'],500);
		return response()->json($oFile->toArray());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($classified,$id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($classified,$id)
	{
		$image = false;
		if( Request::segment(1) == "deals" )
			$image = DealImage::find($id);
		else if( Request::segment(1) == "posts" )
			$image = ClassifiedImage::find($id);		
		if( ! $image )
			return response()->json(['error'=>'image not found'],500);

		$image->delete();

		return response()->json(['message'=>'image deleted']);
	}
}
