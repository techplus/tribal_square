<?php 
namespace App\Http\Controllers\Admin;
use App\Models\Classified;
use App\Http\Controllers\Controller;
use Request;
Class PostsController extends Controller{
	public function index()
	{
		$oClassified = Classified::with('ListingCategory');
		$status = Request::has('status') ? Request::input('status') : 'pending';
		switch( $status )
		{
			case "approved" :
				$oClassified = $oClassified->where('is_approved_by_admin',1);
				break;
			case "declined":
				$oClassified = $oClassified->where('is_approved_by_admin',2);
				break;
			case "archived":
				$oClassified = $oClassified->onlyTrashed();
				break;
			case "pending":
				$oClassified = $oClassified->where('is_approved_by_admin',0);
				break;
		}
		$this->data['aPosts'] = $oClassified->get();
		$this->data['sStatus'] = ucfirst($status);
		return $this->renderView('admin.posts.index');
	}

	public function update($id)
	{
		$post = Classified::withTrashed()->find($id);
		if( ! $post )
			return response()->json(array('error'=>'can\'t find post'),500);

		if( Request::has('is_approved_by_admin') )
		{
			$post->restore();
			$post->is_approved_by_admin = Request::input('is_approved_by_admin');
			$post->save();
		}
		if( Request::has('status') )
		{
			if( Request::input('status') == 'archived' )
				$post->delete();
			if( Request::input('status') == 'force_delete' )
				return $this->destroy($id);
		}
		return response()->json($post->toArray());
	}

	public function destroy($id)
	{
		$post = Classified::withTrashed()->find($id);
		if( ! $post )
			return response()->json(array('error'=>'can\'t find post'),500);

		$post->forceDelete();
		return response()->json(['success'=>true]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$classified = Classified::withTrashed()->with(['ClassifiedImages','ListingCategory'])->find($id);
		if( ! $classified )
			return abort(404);

		$this->data['sStatus'] = "";

		if( $classified->trashed() )
			$this->data['sStatus'] = "Archived";
		else if( $classified->is_approved_by_admin == 0 )
			$this->data['sStatus'] = "Pending";
		else if( $classified->is_approved_by_admin == 1 )
			$this->data['sStatus'] = "Approved";
		else if( $classified->is_approved_by_admin == 2 )
			$this->data['sStatus'] = "Declined";
		
		$this->data['classified'] = $classified;
		$this->data['layout'] = "layouts.admin";
		return $this->renderView('front.classified_full_view');
	}
}
?>