<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Config;
class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;	
	protected $data = array();

	public function __construct()
	{
		$this->data['categories'] = Config::get('categories');
	}
	public function renderView( $sViewName )
	{
		return view( $sViewName , $this->data );
	}
}
