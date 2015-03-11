<?php namespace App\Http\Controllers;

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
		return view( $sViewName , $this->data );
	}
}
