<?php 
namespace App\Http\Controllers\Admin;
use App\Models\Deal;
use App\Http\Controllers\Controller;
use Request;
Class DealsController extends Controller{
	public function index()
	{
		$oDeal = Deal::with('ListingCategory');
		$status = Request::has('status') ? Request::input('status') : 'pending';
		switch( $status )
		{
			case "approved" :
				$oDeal = $oDeal->where('is_approved_by_admin',1);
				break;
			case "declined":
				$oDeal = $oDeal->where('is_approved_by_admin',2);
				break;
			case "archived":
				$oDeal = $oDeal->onlyTrashed();
				break;
			case "pending":
				$oDeal = $oDeal->where('is_approved_by_admin',0);
				break;
		}
		$this->data['aDeals'] = $oDeal->get();
		$this->data['sStatus'] = ucfirst($status);
		return $this->renderView('admin.deals.index');
	}
	public function update($id)
	{
		$deal = Deal::withTrashed()->find($id);
		if( ! $deal )
			return response()->json(array('error'=>'can\'t find deal'),500);

		if( Request::has('is_approved_by_admin') )
		{
			$deal->restore();
			$deal->is_approved_by_admin = Request::input('is_approved_by_admin');
			$deal->save();
		}
		if( Request::has('status') )
		{
			if( Request::input('status') == 'archived' )
				$deal->delete();
			if( Request::input('status') == 'force_delete' )
				return $this->destroy($id);
		}
		return response()->json($deal->toArray());
	}

	public function destroy($id)
	{
		$deal = Deal::withTrashed()->find($id);
		if( ! $deal )
			return response()->json(array('error'=>'can\'t find deal'),500);

		$deal->forceDelete();
		return response()->json(['success'=>true]);
	}
}
?>