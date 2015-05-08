<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Shift;
use App\Models\Account;
use App\Models\Bio;
use App\Models\User;
use App\Models\Experience;
use App\Models\Availability;
use App\Models\Skill;
use App\Models\Nationality;
use App\Models\Religion;
use Request;
use Auth;
use Validator;
use DB;
use Hash;
use File;

class BabySittersController extends Controller
{
	private $aMenu = array(		
			'1' => 'account1',
			'2' => 'account2',
			'3' => 'bio',
			'4' => 'experience',
			'5' => 'availability',
			'6' => 'skill'
	);	
	private $aMenuLabels = array(		
			'1' => 'Account Basics',
			'2' => 'Account Info',
			'3' => 'Bio & Preferences',
			'4' => 'Experience',
			'5' => 'Availability',
			'6' => 'Skill and Abilities'
	);	

	public function getIndex( $section = null )
	{				
		$this->data['aMenu'] = $this->aMenu;
		$this->data['aMenuLables'] = $this->aMenuLabels;
		$section = ( $section == null OR empty( $section ) ) ? 'account1' : $section ;
		$aResp = $this->__hasAccess( $section , $this->data['oUser']->id );			
		if( ! $aResp['bAccess'] )
		{
			return abort(403,"Access Denied");
		}
		$this->data[ 'last_step' ] = $aResp['last_step'];	

		$this->data['section'] = $section;

		if( $section == "account1" OR $section == "account2" )
		{
			$this->data['aNationality'] = Nationality::all();
			$this->data['aReligion'] = Religion::all();

			$oAccountBasics = Account::where( 'user_id' , '=' , $this->data['oUser']->id )->first();
			if( $oAccountBasics )
			{
				$this->data[ 'oAccountBasics' ] = $oAccountBasics;
			}
			else
				$this->data[ 'oAccountBasics' ] = new Account();
		}
		else if( $section == "bio" )
		{
			$oBio = Bio::where( 'user_id' , '=' , $this->data['oUser']->id )->first();
			if( $oBio )
			{
				$this->data[ 'oBio' ] = $oBio;
			}
			else
				$this->data[ 'oBio' ] = new Bio();
		}
		else if( $section == "experience" )
		{
			$oExperience = Experience::where( 'user_id' , '=' , $this->data['oUser']->id )->first();
			if( $oExperience )
			{
				$this->data[ 'oExperience' ] = $oExperience;
			}
			else
				$this->data[ 'oExperience' ] = new Experience();
		}
		else if( $section == "availability" )
		{
			$this->data[ 'aDays' ] = Day::all();
			$this->data[ 'aShifts' ] = Shift::all();			

			$aDayShift = array();
			$oUser = $this->data['oUser'];

			$aUserDays = Day::with( array( 'Shifts' => function($q) use($oUser){
				$q->where( 'day_shifts.user_id','=',$oUser->id );
			}))->get();
			
			if( $aUserDays->count() > 0 )
			{
				foreach( $aUserDays as $oUserDays )
				{										
					foreach( $oUserDays->Shifts as $oShifts )
					{												
						$aDayShift[ $oShifts->pivot->shift_id ][ $oShifts->pivot->day_id ] = 'on';
					}
				}
			}	
			
			$this->data[ 'aDayShifts' ] = $aDayShift;

			$oAvailability = Availability::where( 'user_id' , '=' , $this->data['oUser']->id )->first();

			if( $oAvailability )
			{
				$this->data[ 'oAvailability' ] = $oAvailability;
			}
			else
				$this->data[ 'oAvailability' ] = new Availability();
		}
		else if( $section == "skill" )
		{
			$oSkill = Skill::where( 'user_id' , '=' , $this->data['oUser']->id )->first();
			if( $oSkill )
			{
				$this->data[ 'oSkill' ] = $oSkill;
			}
			else
				$this->data[ 'oSkill' ] = new Skill();
		}
		
		return $this->renderView('babysitters.'.$section);
	}

	public function postStore()
	{
		$section = Request::input('section');
		$oUser = Auth::user();
		$nextSection = "account1";	

		if( $section == "account1" )
		{			
									
			$oAccountBasics = Account::where( 'user_id' , '=' , $oUser->id )->first();
			$aData = Request::only( [ 'address' , 'street' , 'state' , 'city' , 'country' , 'pin','nationality', 'religion' ] );	

			$validator = Validator::make(
					Request::all(),
				    [ 'email' => 'required|email|unique:users,email,'.$oUser->id ]			   
			);				
				
			if( $validator->fails() )
			{				
				return redirect()->back()->withErrors($validator->errors());
			}

			$aUser['firstname'] = Request::input('firstname');
			$aUser['lastname'] = Request::input('lastname');
			$aUser['email'] = Request::input('email');
			if( Request::input('password') != "" )
			{
				$aUser['password'] = Hash::make( Request::input('password') );
			}
			User::where('id','=',$oUser->id)->update($aUser);
			
			if( $oAccountBasics )
			{
				 $oAccountBasics = Account::where( 'user_id' , '=' , $oUser->id )->update( $aData );
			}
			else{
				$aData[ 'user_id' ] = $oUser->id;
				$oAccountBasics = Account::create($aData);
			}

			if( $oAccountBasics )
			{
				$this->__setLastStep(2);
				$nextSection = "account2";				
			}
		}
		else if( $section == "account2" )
		{
			$oAccountInfo = Account::where( 'user_id' , '=' , $oUser->id )->first();
			$aData = Request::only( [ 'gender' , 'phone' , 'display_phone_on_profile' ] );			
			$sDay = Request::input('day');
			$sMonth = Request::input('month');
			$sYear = Request::input('year');
			$aData[ 'birthdate' ] = $sYear."-".$sMonth."-".$sDay;

			if( Request::hasFile('file') )
			{
				if( $oAccountInfo->profile_pic != "" )
					File::delete( base_path('profile_pictures').'/'.$oAccountInfo->profile_pic  );
				$oFile = Request::file('file');
				$filename = $oFile->getClientOriginalName();
				$path = base_path('profile_pictures').'/';
				$counter = 1;
				while( File::exists($path.$filename) )
					$filename = pathinfo($oFile->getClientOriginalName(),PATHINFO_FILENAME)."_".$counter++.".".pathinfo($oFile->getClientOriginalName(),PATHINFO_EXTENSION);
				$oFile->move(base_path('profile_pictures'),$filename);
				$aData['profile_pic'] = $filename;
			}

			if( $oAccountInfo )
			{
				 Account::where( 'user_id' , '=' , $oUser->id )->update( $aData );
				 $this->__setLastStep(3);
				 $nextSection = "bio";		
			}			
			
		}
		else if( $section == "bio" )
		{
			$oBio = Bio::where( 'user_id' , '=' , $oUser->id )->first();
			$aData = Request::only(
					[ 'title', 'experience', 'have_own_car', 'comfortable_with_pets', 'do_smoke', 'average_rate_from' , 'average_rate_to' , 'increase_rate_for_each_child', 'miles_from_home' , 'no_of_childrens_comfortable_with' ]
			);
			if( $oBio )
			{
				$oBio = Bio::where( 'user_id' , '=' , $oUser->id )->update($aData);
			}
			else{
				$aData[ 'user_id' ] = $oUser->id;
				$oBio = Bio::create($aData);				
			}

			if( $oBio )
			{
				$this->__setLastStep(4);
				$nextSection = "experience";		
			}
		}
		else if( $section == "experience" )
		{
			$oExperience = Experience::where( 'user_id' , '=' , $oUser->id )->first();
			$aData = Request::only(
				[ 'have_experience_caring_child_with_special_needs' , 'have_experience_caring_infants', 'have_experience_caring_twins' , 'have_experience_provide_homework_help' , 'paid_child_care_experience_years' , 'willing_care_for_sick_children' , 'have_special_needs_service_experience' ]
			);
			

			if( Request::has('age_groups_experience_with') ){
				$aAgeGroups = Request::input('age_groups_experience_with');				
				$sAgeGroup = implode(",",$aAgeGroups);
				$aData[ 'age_groups_experience_with' ] = $sAgeGroup;
			}

			if( Request::has('special_needs_service_experience') )
			{
				$aSpecialNeeds = Request::input('special_needs_service_experience');
				$sSpecialNeed = implode(',',$aSpecialNeeds);
				$aData[ 'special_needs_service_experience' ] = $sSpecialNeed;
			}

			if( $oExperience )
			{
				$oExperience = Experience::where( 'user_id' , '=' , $oUser->id )->update($aData);
			}
			else{
				$aData[ 'user_id' ] = $oUser->id;
				$oExperience = Experience::create($aData);
			}

			if( $oExperience )
			{
				$this->__setLastStep(5);
				$nextSection = "availability";		
			}
		}
		else if( $section == "availability" )
		{			
			$aDays = Day::all();
			$aShifts = Shift::all();			
			$aDayShift = array();

			$aUserDays = Day::with( array( 'Users' => function($q) use($oUser){
				$q->where( 'day_shifts.user_id','=',$oUser->id );
			}))->get();			

			if( $aUserDays->count() > 0 )
			{
				foreach( $aUserDays as $oUserDays )
				{
					foreach( $oUserDays->Users as $oUsers )
					{							
						$aDayShift[ $oUsers->pivot->shift_id ][ $oUsers->pivot->day_id ] = $oUsers;
					}
				}
			}

			if( $aDays->count() > 0 AND $aShifts->count() > 0 )
			{
				foreach( $aShifts as $oShift )
				{
					foreach( $aDays as $oDay )
					{
						if( Request::has('shift_'.$oShift->id."_".$oDay->id) )
						{
							if( !isset( $aDayShift[ $oShift->id ][ $oDay->id ] ))
							{
								$aInsDayShift = array( 
									'user_id' => $oUser->id,
									'day_id' => $oDay->id,
									'shift_id' => $oShift->id,
									'created_at' => date('Y-m-d H:i:s'),
									'updated_at' => date('Y-m-d H:i:s')
								);								
								DB::table('day_shifts')->insert($aInsDayShift);
							}
						}
						else
						{
							if( isset( $aDayShift[ $oShift->id ][ $oDay->id ] ) )
							{								
								DB::table('day_shifts')->where('user_id','=',$oUser->id)->where('shift_id','=',$oShift->id )->where('day_id','=',$oDay->id)->delete();
							}
						}
					}
				}				
			}

			$oAvailability = Availability::where( 'user_id' , '=' , $oUser->id )->first();
			$aData = Request::only( 
				[ 'available_on_short_notice' , 'available_to_provide_daytime_care_during_summer_months' , 'available_before_school_care' , 'available_after_school_care' ] 
			);

			$aData[ 'schedule_valid_until' ] = preg_replace('/(\d{2})\/(\d{2})\/(\d{4})/', '$3-$1-$2', Request::input('schedule_valid_until'));
			
			if( $oAvailability )
			{
				$oAvailability = Availability::where( 'user_id' , '=' , $oUser->id )->update($aData);
			}
			else
			{
				$aData[ 'user_id' ] = $oUser->id;
				$oAvailability = Availability::create($aData);
			}

			if( $oAvailability )
			{
				$this->__setLastStep(6); 
				$nextSection = "skill";
			}
		}
		else if( $section == "skill" )
		{

			$oSkill = Skill::where( 'user_id' , '=' , $oUser->id )->first();
			$aData = Request::only( 
				[ 'languages_spoken' , 'reference_name' , 'reference_relationship' , 'reference_name2' , 'reference_relationship2' ] 
			);

			if( Request::has('homework_help') ){
				$aHomeworkHelp = Request::input('homework_help');				
				$sHomeworkHelp = implode(",",$aHomeworkHelp);
				$aData[ 'homework_help' ] = $sHomeworkHelp;
			}

			if( Request::has('additional_services') ){
				$aAddServices = Request::input('additional_services');				
				$sAddServices = implode(",",$aAddServices);
				$aData[ 'additional_services' ] = $sAddServices;
			}

			if( $oSkill )
			{
				$oSkill = Skill::where( 'user_id' , '=' , $oUser->id )->update($aData);
			}
			else
			{
				$aData[ 'user_id' ] = $oUser->id;
				$oSkill = Skill::create($aData);				
			}	
			/*if( $oSkill )		
				$this->__setLastStep(6); 	*/			
		}
		
		return redirect()->to( 'baby-sitters/index/'.$nextSection );
	}

	private function __setLastStep( $step )
	{
		$oUser = Auth::user();
		$oUserType = DB::table('user_usertypes')->where( 'user_id' , '=' , $oUser->id )->first();
		if( $oUserType )
		{
			if( $oUserType->last_step < $step )
			{
				unset($oUser->type);
				$oUser->last_step = $step;
				$oUser->save();				
				Auth::user()->last_step = $step;
				DB::table('user_usertypes')->where( 'user_id' , '=' , $oUser->id )->update( [ 'last_step' => $step ] );
				return $step;
			}
			return $oUserType->last_step;
		}
		return 1;
	}

	private function __hasAccess( $sSection , $iUserId )
	{
		$aResponse = array();
		$aResponse[ 'bAccess' ] = false;
		$aResponse[ 'sSection' ] = $this->aMenu[ 1 ]; 
		$aResponse[ 'last_step' ] = 1; 
		$oUserType = DB::table('user_usertypes')->where( 'user_id' , '=' , $iUserId )->first();
		if( $oUserType )
		{
			$aResponse[ 'last_step' ] = $oUserType->last_step; 
			$iStepNo = array_search( $sSection , $this->aMenu	);
			if( $iStepNo > $oUserType->last_step )		
			{
				$aResponse[ 'sSection' ] = $this->aMenu[ $oUserType->last_step ];
			}
			else
			{
				$aResponse[ 'sSection' ] = $sSection;
				$aResponse[ 'bAccess' ] = true;
			}
		}		
		return $aResponse;
	}
}