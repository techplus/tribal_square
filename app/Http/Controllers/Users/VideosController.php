<?php namespace App\Http\Controllers\Users;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use File;
use App\Models\ClassifiedVideo;
class VideosController extends Controller {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($classified)
	{
		if( ! Request::hasFile('file') AND ! Request::input('video_path'))
			return response()->json(['error'=>'file is not specified'],500);

		$aVideoData = array('classified_id'=>$classified);
		if( Request::hasFile('file') ) {
			$oFile = Request::file ( 'file' );
			$oFile->move ( base_path ( 'uploads' ) , $oFile->getClientOriginalName () );
			$aVideoData['video_path'] = $oFile->getClientOriginalName();
		}
		else
			$aVideoData['video_path'] = Request::input('video_path');

		$aFileData = $aVideoData;

		$oFile = ClassifiedVideo::create($aFileData);
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
		$image = ClassifiedVideo::find($id);
		if( ! $image )
			return response()->json(['error'=>'video not found'],500);

		$image->delete();

		return response()->json(['message'=>'video deleted']);
	}
}
