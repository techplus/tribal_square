<?php 
namespace App\Http\Controllers\Admin;
use App\Models\Deal;
use App\Http\Controllers\Controller;
Class DealsController extends Controller{
	public function getIndex( $status = null )
	{
		$this->data[ 'aDeals' ] = Deal::with( [ 'ListingCategory' ] )->where( 'is_approved_by_admin' , '=' , 0 )->get();
		$this->data[ 'sStatus' ] = "Pending";
		if( $status != null )
		{
			if( $status == "Approved" ){
				$this->data[ 'aDeals' ] = Deal::with( [ 'ListingCategory' ] )->where( 'is_approved_by_admin' , '=' , 1 )->get();
				$this->data[ 'sStatus' ] = "Approved";
			}
			else if( $status == "Declined" ){
				$this->data[ 'aDeals' ] = Deal::with( [ 'ListingCategory' ] )->where( 'is_approved_by_admin' , '=' , 2 )->get();
				$this->data[ 'sStatus' ] = "Declined";
			}
			else if( $status == "Archived" ){
				$this->data[ 'aDeals' ] = Deal::with( [ 'ListingCategory' ] )->onlyTrashed()->get();
				$this->data[ 'sStatus' ] = "Archived";
			}
		} 
		return $this->renderView('admin.deals.index');
	}
	public function postApproveDeal($id)
	{
		$oDeal = Deal::find($id);
		if( ! $oDeal )
			return response()->json( [ 'error'=>"Can't find Deal" ],500);

		$oDeal->update( array( 'is_approved_by_admin' => 1 ) );
		return response()->json( $oDeal -> toArray() );
	}
	public function postDeclinedDeal($id)
	{
		$oDeal = Deal::find($id);
		if( ! $oDeal )
			return response()->json( [ 'error' => "Can't find Deal" ],500);

		$oDeal->update( array( 'is_approved_by_admin' => 2 ) );
		return response()->json( $oDeal -> toArray() );
	}
}
?>