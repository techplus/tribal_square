<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Request;
use App\Models\UserType;
use App\Models\Account;
use App\Models\Bio;
use App\Models\Availability;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Shift;
use App\Models\Day;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Language;
use DB;
use View;
use App\Models\User;

class BabySittersController extends Controller {

	public function __construct()
	{
		parent::__construct();
		
		
		$this->data['aSearch'] = session('search');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data['aNationality'] = Nationality::all();
		$this->data['aReligion'] = Religion::all();

        $aSearch = session('search');
		
		$iLimit = 5;
		$iOffset = 0;
		
		$aResp = $this->getBabysitters($iLimit,$iOffset,$aSearch);

        $aBabySitters = $aResp['aBabySitters'];

		$this->data['iTotal'] = $aResp['iTotal'];
		$this->data['aBabySitters'] = $aBabySitters->each(function($q){
			$q->rating = $q->MyRatings()->avg('score');
		});
		$this->data['iLimit'] = $iLimit;
		$this->data['iOffset'] = $iOffset + $iLimit;

		return $this->renderView('front.search_babysitters');
	}

	public function getBabysitters($limit,$offset,$aSearch,$needRow = 0,$id = 0)
	{
		DB::enableQueryLog();
		$aBabySitters = array();
		$iTotal = 0;
		
		//dd($aSearch['type']);
		if( $aSearch['type'] == 'baby_sitter')
		{	
			// if(isset($aSearch['frate']))
			// {
			// 	//echo $aSearch['type'];
			// 	$oQuery = User::approvedstate(1)
			// 	->with( [ 'UserTypes' , 'Account' => function($q){
			// 		$q->select( [ DB::raw('DATE_FORMAT(FROM_DAYS(TO_DAYS(now()) - TO_DAYS(accounts.birthdate)), "%Y") + 0 as age') , 'accounts.*' ] );
			// 	}, 'Bio','Experience','Availability','Skill','Days']);

			//  	$oQuery->filterrate($aSearch);
			// }


			if(isset($aSearch['ftype']))
			{
				//echo $aSearch['type'];
				$oQuery = User::approvedstate(1)
				->with( [ 'UserTypes' , 'Account' => function($q){
					$q->select( [ DB::raw('DATE_FORMAT(FROM_DAYS(TO_DAYS(now()) - TO_DAYS(accounts.birthdate)), "%Y") + 0 as age') , 'accounts.*' ] );
				}, 'Bio','Experience','Availability','Skill','Days']);

			 	$oQuery->filterkeywords($aSearch);
			}
			else
			{
				//var_dump($aSearch);
				$oQuery = User::approvedstate(1)
				->with( [ 'UserTypes' , 'Account' => function($q){
					$q->select( [ DB::raw('DATE_FORMAT(FROM_DAYS(TO_DAYS(now()) - TO_DAYS(accounts.birthdate)), "%Y") + 0 as age') , 'accounts.*' ] );
				}, 'Bio','Experience','Availability','Skill','Days']);

			 	$oQuery->filterkeywords($aSearch);
		 	}

		}
		else
		{	
			$oQuery = User::approvedstate(1)->search($aSearch)
			->with( [ 'UserTypes' , 'Account' => function($q){
				$q->select( [ DB::raw('DATE_FORMAT(FROM_DAYS(TO_DAYS(now()) - TO_DAYS(accounts.birthdate)), "%Y") + 0 as age') , 'accounts.*' ] );
			}, 'Bio','Experience','Availability','Skill','Days']);
			
			$oQuery->search($aSearch);
		}


		$iTotal = $oQuery->count();
		$aResp['iTotal'] = $iTotal;
		if( !$needRow )
		{			

			$aBabySitters = $oQuery->groupBy('users.id')
						->take($limit)
			   			->skip($offset)
			   			->get();			 
			
			//var_dump(DB::getQueryLog());			
			//exit;
			$aResp['aBabySitters'] = $aBabySitters;			
		}
		else
		{	
			$oBabySitter = $oQuery->get();
			$aArray = $oBabySitter->toArray();

			foreach ($aArray as $key=>$object) {
				if( $id == $object['id'] )
				{
					
					$aResp['sequence_id'] = $key+1;
					if( $key == (count($aArray) - 1) )
					{
						$aResp['next_id'] = $aArray[0]['id'];
					}
					else
					{
						if($key == (count($aArray)))
						{
							$aResp['prev_id'] = $aArray[$key-1]['id'];
						 	break;
					 	}
					    else
					    {
					    		$aResp['next_id'] = $aArray[$key+1]['id'];
					    }
					}
					if(isset($aArray[$key-1]))
						$aResp['prev_id'] = $aArray[$key-1]['id'];	
					break;
				}

			}
			$aResp['oBabySitter'] = $oBabySitter->filter(function($q) use($id){
				return $q->id == $id;
			})->first();					
		}

		return $aResp;

		//dd($oQuery);
		// // $oQuery =  DB::table('users')
		// // 				->leftJoin('user_usertypes','users.id','=','user_usertypes.user_id')
		// // 				->leftJoin('user_types','user_usertypes.user_type_id','=','user_types.id')
		// // 				->leftJoin('accounts','users.id','=','accounts.user_id')
		// // 				->leftJoin('bios','users.id','=','bios.user_id')
		// // 				->select( [ 'users.firstname' , 'users.lastname' , 'users.last_logged_in' , DB::raw('DATE_FORMAT(FROM_DAYS(TO_DAYS(now()) - TO_DAYS(accounts.birthdate)), "%Y") + 0 as age'), 'accounts.profile_pic' , 'users.id' , 'bios.miles_from_home' , 'bios.experience'] )
		// // 				->where( 'users.last_step' , '>=' , 6 )
		// // 				->where( 'user_types.name', '=' , 'BabySitters' );
						

		// if( !empty( $aSearch['term'] ) AND !empty( $aSearch['location'] ) )
		// {
		// 	$term = $aSearch['term'];
		// 	$location = $aSearch['location'];
			
		// 	$oQuery->where(function($q)use($term){
		// 				$q->where('bios.title','LIKE','%'.$term.'%')
		// 				->orWhere('bios.experience','LIKE','%'.$term.'%');							
		// 			})	
		// 			->where(function($q)use($location){
		// 				$q->where('accounts.address','LIKE','%'.$location.'%')
		// 				->orWhere('accounts.state','LIKE','%'.$location.'%')
		// 				->orWhere('accounts.city','LIKE','%'.$location.'%')
		// 				->orWhere('accounts.pin','LIKE','%'.$location.'%')							
		// 				->orWhere('accounts.country','LIKE','%'.$location.'%')							
		// 				->orWhere('accounts.street','LIKE','%'.$location.'%');							
		// 			});																	
							
		// }
		// else if( !empty($aSearch['term']) )
		// {
		// 	$term = $aSearch['term'];			
		// 	$oQuery->where(function($q)use($term){
		// 					$q->where('bios.title','LIKE','%'.$term.'%')
		// 					->orWhere('bios.experience','LIKE','%'.$term.'%');							
		// 			});
		// }
		// else if( !empty($aSearch['location']) ){
		// 	$term = $aSearch['term'];
		// 	$location = $aSearch['location'];
		// 	$oQuery->where(function($q)use($location){
		// 					$q->where('accounts.address','LIKE','%'.$location.'%')
		// 					->orWhere('accounts.state','LIKE','%'.$location.'%')
		// 					->orWhere('accounts.city','LIKE','%'.$location.'%')
		// 					->orWhere('accounts.pin','LIKE','%'.$location.'%')							
		// 					->orWhere('accounts.country','LIKE','%'.$location.'%')							
		// 					->orWhere('accounts.street','LIKE','%'.$location.'%');							
		// 	});												
		// }

		// $iTotal = $oQuery->count();
		
		// $aBabySitters = $oQuery->groupBy('users.id')
		// 				->take($limit)
		// 	   			->skip($offset)
		// 	   			->get();

		// $aResp['iTotal'] = $iTotal;
		// $aResp['aBabySitters'] = $aBabySitters;			
		//return $aResp;						
	}

	public function postPaginatedBabySitters()
	{
		$aResponse['aBabySitters'] = array();
		if( Request::has('limit') AND Request::has('offset') )
		{
			$aSearch = session('search');			
			
			$iLimit = Request::get('limit');
			$iOffset = Request::get('offset');
			
			$aResp = $this->getBabysitters($iLimit,$iOffset,$aSearch);
			//$aResponse['aBabySitters'] = $aResp['aBabySitters'];
			$aResponse['html'] = View::make('front.sub_babysitters')->with(array('aBabySitters'=>$aResp['aBabySitters']))->render();
			$aResponse['iTotal'] = $aResp['iTotal'];

			$iOffset = $iOffset+$iLimit;
			$aResponse['iOffset'] = $iOffset;
		}	
		return response()->json($aResponse,200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user_id)
	{		

		$aSearch = session('search');
		$oUser = User::find($user_id);
		
		if( !$oUser )
			abort(404);		
		
		$this->data['aDays'] = Day::all();
		$this->data['aShifts'] = Shift::all();				

		$aResponse = $this->getBabysitters ( 0 , 0 , $aSearch , 1 , $user_id );
		$this->data['oBabySitter'] = $aResponse[ 'oBabySitter' ];		
		$this->data['iSequenceId'] = ( isset($aResponse['sequence_id']) ) ? $aResponse['sequence_id']  : 1;
		
		$this->data['iPrevId'] = ( isset($aResponse['prev_id']) ) ? $aResponse['prev_id']  : $user_id;
		$this->data['iNextId'] = ( isset($aResponse['next_id']) ) ? $aResponse['next_id']  : $user_id;
		$this->data['iTotal'] = $aResponse['iTotal'];

		$aDayShifts = [];
		if( $this->data['oBabySitter']->Days->count() > 0 )
		{
			foreach( $this->data['oBabySitter']->Days as $oDay )
			{
				$aDayShifts[ $oDay->pivot->shift_id ][ $oDay->pivot->day_id ] = "on";
			}
		}
		
		$this->data['aDayShifts'] = $aDayShifts;
		$this->data['layout'] = 'layouts.front';
		return $this->renderView( 'front.babysitter_profile' );
	}
		
}
