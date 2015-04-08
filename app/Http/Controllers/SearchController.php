<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
class SearchController extends Controller {

	public function store()
	{		
		$aLastSearch = session('search');
		$aSearch = ['term'=>Request::input('term','')];
		$aSearch['location'] = Request::input('location','');
		$aSearch['type'] = Request::input('type','deals');
		$aSearch['cat'] =  Request::input('cat','');

		if( !empty($aLastSearch['cat']) )
		{
			if( $aSearch['type'] != $aLastSearch['type'] )
			{
				$aSearch['cat'] = "";
			}
		}

		session(['search'=>$aSearch]);		
		if( $aSearch['type'] == 'deals' )
			return redirect()->route('search.deals.index');
		if( $aSearch['type'] == 'classified' )
			return redirect()->route('search.classified.index');
		if( $aSearch['type'] == 'baby_sitter' )
			return redirect()->route('search.babysitters.index');
	}	

}
