<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Shift;

class BabySittersController extends Controller
{
	public function getIndex( $section = null )
	{
		$section = ( $section == null OR empty( $section ) ) ? 'account1' : $section ;
		if( $section == "availability" )
		{
			$this->data[ 'aDays' ] = Day::all();
			$this->data[ 'aShifts' ] = Shift::all();
		}	
		return $this->renderView('babysitters.'.$section);
	}
}