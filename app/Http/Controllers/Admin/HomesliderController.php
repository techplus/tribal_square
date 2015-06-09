<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomesliderRequest;
use App\Models\Homeslider;
use Request;
use Validator;

class HomesliderController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	

		$this->data['aHomeSlider'] = Homeslider::all();

		return $this->renderView('admin.admins.homeslider');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->renderView('admin.admins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$aHomeSlider = Homeslider::all();

		//$files = Request::file('slider_img');
		foreach( $aHomeSlider as $key=>$oHome )
		{
			//$file->move(public_path('slider'),$file->getClientOriginalName());
			$data = array();
			$data['slidertitle'] = Request::input('slidertitle_'.$oHome->id);
			$data['link'] = Request::input('link_'.$oHome->id);

			$destinationPath = url('slider').'/';

			if(Request::hasFile('slider_img_'.$oHome->id))
			{
				$file = Request::file('slider_img_'.$oHome->id);

				$fileName = $file->getClientOriginalName();	

				Request::file('slider_img_'.$oHome->id)->move(base_path('slider'), $fileName);

				$data['image_path'] = $destinationPath.$fileName;
			}
			
			Homeslider::where('id',$oHome->id)->update($data);
			
		}
		return redirect()->back()->with('success','Slider Image Uploaded..');
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
		$this->data['user'] = User::find($id);
		if( ! $this->data['user'])
			return abort(404);
		return $this->renderView('admin.admins.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		SubscriptionPlan::where('id',$id)->update(Request::all());
		
		$aResp[ 'success' ] = true;
		Session::put('success','Subscription Plan update successfully');
		//unset( $aResp[ 'msg' ] );

		return response()->json(SubscriptionPlan::find($id));
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

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function settings()
	{
		$this->data['admins'] = User::whereHas('UserTypes',function($q){
			$q->where('name','Admin');
		})->get();
		return $this->renderView('admin.admins.index');
	}

}
