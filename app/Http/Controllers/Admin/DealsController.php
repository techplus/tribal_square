<?php 
namespace App\Http\Controllers\Admin;
use App\Models\Deal;
use App\Models\ListingCategory;
use App\Models\User;
use App\Http\Controllers\Controller;
use Request;
use Mail;
Class DealsController extends Controller{

	public function __construct()
	{
		parent::__construct();

		$this->data['subcategories'] = ListingCategory::Deals()->get();
	}

	public function index()
	{
		$oDeal = Deal::with(['ListingCategory','Owner']);
		$status = Request::has('status') ? Request::input('status') : 'pending';
		switch( $status )
		{
			case "approved" :
				$oDeal = $oDeal->where('is_approved_by_admin',1)->future();
				break;
			case "declined":
				$oDeal = $oDeal->where('is_approved_by_admin',2);
				break;
			case "archived":
				$oDeal = $oDeal->onlyTrashed();
				break;
			case "pending":
				$oDeal = $oDeal->where('is_approved_by_admin',0)->orderBy('created_at','desc');
				break;
			case "expired" :
				$oDeal = $oDeal->expired();
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
			$email = Request::input('email');
			$firstname = Request::input('firstname');
			$lastname = Request::input('lastname');
			
			if(Request::input('is_approved_by_admin') == '1')
			{
				Mail::send('emails.approveddeal',
					array(
						'email' => $email,
						'firstname' => $firstname,
						'lastname' => $lastname
					), function($message) use ($email,$firstname,$lastname)
					{
						// deals@tribalsquare.com
						$message->from('deals@tribalsquare.com', 'TribalSquare Deals');
						$message->to($email)->subject('TribalSquare Deal Approved');
					});
			}
		}
		if( Request::has('status') )
		{
			if( Request::input('status') == 'archived' )
				$deal->delete();
			if( Request::input('status') == 'force_delete' )
				return $this->destroy($id);
		}
		if( Request::has('is_deal_of_the_day') ) {
			if( Request::input( 'is_deal_of_the_day' ) == 1 ) {
				$aDeals = Deal::where( 'end_date' , '>=' , date( 'Y-m-d' ) )->where( 'is_approved_by_admin' , 1 )->where( 'is_deal_of_the_day' , 1 )->get();
				if ( $aDeals->count() > 3 )
					return response()->json( [ 'error' => '"4 deal of the day maximum".Please un-select one of the deal to select more "deal of the day"' ] , 500 );
			}
			$deal->is_deal_of_the_day = Request::input( 'is_deal_of_the_day' );
		}

		$deal->save();
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
		$deal = Deal::withTrashed()->with(['DealImages','Owner'])->find($id);
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

		$this->data['aLatestDeals'] = Deal::with( [ 'CoverPic' ] )->approved()->future()->orderBy('updated_at','DESC')->take(5)->get();
		$this->data['deal'] = $deal;
		$this->data['layout'] = 'layouts.admin';
		return $this->renderView('front.deal_full_view');
	}
}
?>