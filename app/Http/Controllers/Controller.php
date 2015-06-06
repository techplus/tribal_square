<?php namespace App\Http\Controllers;

use App\Models\Advertise;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Config;
use Auth;
class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;	
	protected $data = array();

	public function __construct()
	{
		if( Auth::check() )
		{
			$oUser = Auth::user();
			$oType = $oUser->UserTypes()->first();
			$oUser->type = $oType ? $oType->name : null;
			$this->data['oUser'] = $oUser;
		}
		$this->data['categories'] = Config::get('categories');
	}
	public function renderView( $sViewName )
	{
		$routeArray = [	url('/'), 
						url('/auth'),
						url('/register'),
						url('/password'),
						url('/privacypolicy'),
						url('/terms'),
						url('/refundpolicy'),
						url('/register/step2'),
						url('/password/reset')
				];	
		$this->data['oRoutesCheck'] = $routeArray;

		$advertises = Advertise::orderBy('id')->get();
		$this->data['left_ads'] = $advertises->filter(function($a){
			return preg_match('/left_sidebar/',$a->type);
		});
		$this->data['right_ads'] = $advertises->filter(function($a){
			return preg_match('/right_sidebar/',$a->type);
		});
		$this->data['babysitter_ads'] = $advertises->filter(function($a){
			return preg_match('/babysitter/',$a->type);
		});

		return view( $sViewName , $this->data );
	}
}
