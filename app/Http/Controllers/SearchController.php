<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;

class SearchController extends Controller
{

	public function store()
	{
		$aLastSearch = session( 'search' );
		$aSearch = [ 'term' => Request::input( 'term' , '' ) ];
		$aSearch[ 'location' ] = Request::input( 'location' , '' );
		$aSearch[ 'type' ] = Request::input( 'type' , 'deals' );
		$aSearch[ 'cat' ] = Request::input( 'cat' , '' );
		$aSearch[ 'ftype' ] = 'topsearch';

		if ( Request::has( 'keywords' ) || Request::has( 'miles' ) || Request::has( 'near' ) || Request::has( 'nationality' ) || Request::has( 'religion' ) || Request::has( 'from_rate' ) || Request::has( 'to_rate' ) ) {
			$aSearch = [ 'term' => Request::input( 'keywords' ) ];
			$aSearch[ 'location' ] = Request::input( 'location' , '' );
			$aSearch[ 'cat' ] = Request::input( 'cat' , '' );
			$aSearch[ 'type' ] = Request::input( 'type' , 'baby_sitter' );
			$aSearch[ 'fkeywords' ] = 'keywords';
			if ( Request::has( 'miles' ) ) {
				$aSearch[ 'miles' ] = Request::input( 'miles' , '' );
			}
			if ( Request::has( 'near' ) ) {
				$aSearch[ 'near' ] = Request::input( 'near' , '' );
			}
			if ( Request::has( 'nationality' ) ) {
				$aSearch[ 'nationality' ] = Request::input( 'nationality' , '' );
			}
			if ( Request::has( 'religion' ) ) {
				$aSearch[ 'religion' ] = Request::input( 'religion' , '' );
			}
			if ( Request::has( 'from_rate' ) ) {
				$aSearch[ 'from_rate' ] = Request::input( 'from_rate' , '' );
			}
			if ( Request::has( 'to_rate' ) ) {
				$aSearch[ 'to_rate' ] = Request::input( 'to_rate' , '' );
			}
			//dd($aSearch);
		}
		// else if(Request::has('miles'))
		// {
		// 	$aSearch = ['term'=>Request::input('miles')];	
		// 	$aSearch['location'] = Request::input('location','');
		// 	$aSearch['cat'] =  Request::input('cat','');	
		// 	$aSearch['type'] = Request::input('type','baby_sitter');
		// 	$aSearch['ftype'] =  'miles';
		// 	//dd($aSearch);
		// }

		// if(Request::has('from_rate') && Request::has('to_rate'))
		// {
		// 	$aSearch = ['term'=>Request::input('from_rate')];
		// 	$aSearch['to_rate'] = Request::input('to_rate');
		// 	$aSearch['location'] = Request::input('location','');
		// 	$aSearch['cat'] =  Request::input('cat','');	
		// 	$aSearch['type'] = Request::input('type','baby_sitter');
		// 	$aSearch['frate'] =  'from_rate';
		// 	//dd($aSearch);
		// 	//dd($aSearchto);
		// }

		//dd($aSearch);

		if ( !empty( $aLastSearch[ 'cat' ] ) ) {
			if ( $aSearch[ 'type' ] != $aLastSearch[ 'type' ] ) {
				$aSearch[ 'cat' ] = "";
			}
		}

		session( [ 'search' => $aSearch ] );
		if ( $aSearch[ 'type' ] == 'deals' )
			return redirect()->route( 'search.deals.index' );
		if ( $aSearch[ 'type' ] == 'classified' )
			return redirect()->route( 'search.classified.index' );
		if ( $aSearch[ 'type' ] == 'baby_sitter' )
			return redirect()->route( 'search.babysitters.index' );
	}

}
