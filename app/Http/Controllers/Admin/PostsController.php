<?php 
namespace App\Http\Controllers\Admin;
use App\models\Classified;
use App\Http\Controllers\Controller;
Class PostsController extends Controller{
	public function getIndex( $status = null )
	{		
		$this->data[ 'aPosts' ] = Classified::with( [ 'ListingCategory' ] )->where( 'is_approved_by_admin' , '=' , 0 )->get();
		$this->data[ 'sStatus' ] = "Pending";
		if( $status != null )
		{
			if( $status == "Approved" ){
				$this->data[ 'aPosts' ] = Classified::with( [ 'ListingCategory' ] )->where( 'is_approved_by_admin' , '=' , 1 )->get();
				$this->data[ 'sStatus' ] = "Approved";
			}
			else if( $status == "Declined" ){
				$this->data[ 'aPosts' ] = Classified::with( [ 'ListingCategory' ] )->where( 'is_approved_by_admin' , '=' , 2 )->get();
				$this->data[ 'sStatus' ] = "Declined";
			}
			else if( $status == "Archived" ){
				$this->data[ 'aPosts' ] = Classified::with( [ 'ListingCategory' ] )->onlyTrashed()->get();
				$this->data[ 'sStatus' ] = "Archived";
			}
		} 
		return $this->renderView('admin.posts.index');
	}
	
}
?>