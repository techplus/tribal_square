<?php 
namespace App\Http\Controllers\Admin;
use App\Models\Deal;
use App\Models\ListingCategory;
use App\Http\Controllers\Controller;
use Request;
Class DealsController extends Controller{

	public function __construct()
	{
		parent::__construct();

		$this->data['subcategories'] = ListingCategory::Deals()->get();
	}

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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$deal = Deal::withTrashed()->with('DealImages')->find($id);
		if( ! $deal )
			return abort(404);

		$this->data['sStatus'] = "";
		$this->data['cat_id'] = "";
		if( $deal->trashed() )
			$this->data['sStatus'] = "Archived";
		else if( $deal->is_approved_by_admin == 0 )
			$this->data['sStatus'] = "Pending";
		else if( $deal->is_approved_by_admin == 1 )
			$this->data['sStatus'] = "Approved";
		else if( $deal->is_approved_by_admin == 2 )
			$this->data['sStatus'] = "Declined";

		$this->data['aLatestDeals'] = Deal::with( [ 'CoverPic' ] )->orderBy('updated_at','DESC')->take(5)->get();
		$this->data['deal'] = $deal;
		$this->data['layout'] = 'layouts.admin';
		return $this->renderView('front.deal_full_view');
	}
}
?>