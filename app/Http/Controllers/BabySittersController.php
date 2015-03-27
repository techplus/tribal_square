<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\Models\UserType;
use App\Models\Account;
use App\Models\Bio;
use App\Models\Availability;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Shift;
use App\Models\Day;
use DB;


class BabySittersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aSearch = session('search');
		$iLimit = 3;
		$iOffset = 0;
		$aResp = $this->getBabysitters($iLimit,$iOffset,$aSearch);	
		$aBabySitters = $aResp['aBabySitters'];
		$this->data['iTotal'] = $aResp['iTotal'];
		$this->data['aBabySitters'] = $aBabySitters;
		$this->data['iLimit'] = $iLimit;
		$this->data['iOffset'] = $iOffset + $iLimit;

		return $this->renderView('front.search_babysitters');
	}

	public function getBabysitters($limit,$offset,$aSearch)
	{
		$aBabySitters = array();
		$iTotal = 0;
		$oQuery =  DB::table('users')
						->leftJoin('user_usertypes','users.id','=','user_usertypes.user_id')
						->leftJoin('user_types','user_usertypes.user_type_id','=','user_types.id')
						->leftJoin('accounts','users.id','=','accounts.user_id')
						->leftJoin('bios','users.id','=','bios.user_id')
						->select( [ 'users.firstname' , 'users.lastname' , 'users.last_logged_in' , DB::raw('DATE_FORMAT(FROM_DAYS(TO_DAYS(now()) - TO_DAYS(accounts.birthdate)), "%Y") + 0 as age'), 'accounts.profile_pic' , 'users.id' , 'bios.miles_from_home' , 'bios.experience'] )
						->where( 'users.last_step' , '>=' , 6 )
						->where( 'user_types.name', '=' , 'BabySitters' )
						->groupBy('users.id');


		if( !empty( $aSearch['term'] ) AND !empty( $aSearch['location'] ) )
		{
			$term = $aSearch['term'];
			$location = $aSearch['location'];
			
			$oQuery->where(function($q)use($term){
						$q->where('bios.title','LIKE','%'.$term.'%')
						->orWhere('bios.experience','LIKE','%'.$term.'%');							
					})	
					->where(function($q)use($location){
						$q->where('accounts.address','LIKE','%'.$location.'%')
						->orWhere('accounts.state','LIKE','%'.$location.'%')
						->orWhere('accounts.city','LIKE','%'.$location.'%')
						->orWhere('accounts.pin','LIKE','%'.$location.'%')							
						->orWhere('accounts.country','LIKE','%'.$location.'%')							
						->orWhere('accounts.street','LIKE','%'.$location.'%');							
					});																	
							
		}
		else if( !empty($aSearch['term']) )
		{
			$term = $aSearch['term'];			
			$oQuery->where(function($q)use($term){
							$q->where('bios.title','LIKE','%'.$term.'%')
							->orWhere('bios.experience','LIKE','%'.$term.'%');							
					});
		}
		else if( !empty($aSearch['location']) ){
			$term = $aSearch['term'];
			$location = $aSearch['location'];
			$oQuery->where(function($q)use($location){
							$q->where('accounts.address','LIKE','%'.$location.'%')
							->orWhere('accounts.state','LIKE','%'.$location.'%')
							->orWhere('accounts.city','LIKE','%'.$location.'%')
							->orWhere('accounts.pin','LIKE','%'.$location.'%')							
							->orWhere('accounts.country','LIKE','%'.$location.'%')							
							->orWhere('accounts.street','LIKE','%'.$location.'%');							
			});												
		}

		$iTotal = $oQuery->count();
		
		$aBabySitters = $oQuery->take($limit)
			   			->skip($offset)
			   			->get();

		$aResp['iTotal'] = $iTotal;
		$aResp['aBabySitters'] = $aBabySitters;			
		return $aResp;						
	}

	public function postPaginatedBabySitters()
	{
		$aResponse['aBabySitters'] = array();
		if( Request::has('limit') AND Request::has('offset') )
		{
			$aSearch ['term'] = ( Request::has('term')  ) ? Request::get('term') : '';
			$aSearch ['location'] = ( Request::has('location')  ) ? Request::get('location') : '';
			$iLimit = Request::get('limit');
			$iOffset = Request::get('offset');
			$aResp = $this->getBabysitters($iLimit,$iOffset,$aSearch);
			$aResponse['aBabySitters'] = $aResp['aBabySitters'];
			$aResponse['iTotal'] = $aResp['iTotal'];
			$aResponse['iOffset'] = $iOffset + $iLimit;
		}	
		return response()->json($aResponse,200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}
		
}
