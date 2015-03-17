<?php 
namespace App\Http\Controllers\Admin;
use App\models\Deal;
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
}
?>