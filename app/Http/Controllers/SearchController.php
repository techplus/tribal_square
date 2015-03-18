<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
class SearchController extends Controller {

	public function store()
	{
		$aSearch = ['term'=>Request::input('term','')];
		$aSearch['location'] = Request::input('location','');
		$aSearch['type'] = Request::input('type','deals');

		session(['search'=>$aSearch]);
		if( $aSearch['type'] == 'deals' )
			return redirect()->route('search.deals.index');
		if( $aSearch['type'] == 'classified' )
			return redirect()->route('search.classified.index');
	}

}
