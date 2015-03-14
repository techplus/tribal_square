<?php namespace App\Http\Controllers\Users;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use File;
use App\Models\ClassifiedImage;
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
		$oFile->move(base_path('uploads'),$oFile->getClientOriginalName());

		$aFileData = array('classified_id'=>$classified,'image_path'=>url('uploads/'.$oFile->getClientOriginalName()));

		$oFile = ClassifiedImage::create($aFileData);
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
		$image = ClassifiedImage::find($id);
		if( ! $image )
			return response()->json(['error'=>'image not found'],500);

		$image->delete();

		return response()->json(['message'=>'image deleted']);
	}

	public function getDelete($id)
	{
		$image = ClassifiedImage::find($id);
		if( ! $image )
			return response()->json(['error'=>'image not found'],500);

		$image->delete();

		return response()->json(['message'=>'image deleted']);
	}

}
