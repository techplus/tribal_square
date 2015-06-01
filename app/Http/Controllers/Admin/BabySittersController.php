<?php namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use App\Models\Day;
use App\Models\Shift;
use DB;

Class BabySittersController extends Controller{

	public function index()
	{
		$oUser = User::with( 'UserTypes' , 'Account' , 'Bio' );
		$status = Request::has('status') ? Request::input('status') : 'pending';
		switch( $status )
		{
			case "approved" :
				$oUser = $oUser->approvedstate('1');
				break;
			case "declined":
				$oUser = $oUser->approvedstate('2');
				break;
			case "archived":
				$oUser = $oUser->approvedstate('All')->onlyTrashed();
				break;
			case "pending":
				$oUser = $oUser->approvedstate('0');
				break;
		}
		$this->data['aUsers'] = $oUser->get();
		$this->data['sStatus'] = ucfirst($status);
		return $this->renderView('admin.babysitters.index');
	}
	public function update($id)
	{
		$oUser = User::withTrashed()->find($id);
		$oUserType = UserType::where('name','BabySitters')->first();

		if( ! $oUser )
			return response()->json(array('error'=>'can\'t find user'),500);

		if( Request::has('is_approved_by_admin') )
		{
			$oUser->restore();			
			$oUser->UserTypes()->updateExistingPivot( $oUserType->id , [ 'is_approved_by_admin' => Request::input('is_approved_by_admin') ] );		
		}
		if( Request::has('status') )
		{
			if( Request::input('status') == 'archived' )
				$oUser->delete();
			if( Request::input('status') == 'force_delete' )
				return $this->destroy($id);
		}
		return response()->json($oUser->toArray());
	}

	public function destroy($id)
	{
		$oUser = User::withTrashed()->find($id);
		if( ! $oUser )
			return response()->json(array('error'=>'can\'t find user'),500);

		$oUser->forceDelete();
		return response()->json(['success'=>true]);
	}

	public function show($id)
	{	
		$this->data['sStatus'] = "";		
		$oUser = User::withTrashed()->with('UserTypes')->approvedstate()->where('id',$id)->first();
		
		if( !$oUser )
			abort(404);		
		
		$this->data['aDays'] = Day::all();
		$this->data['aShifts'] = Shift::all();				

		$this->data['oBabySitter'] = User::withTrashed()->with( [ 'UserTypes' , 'Account' => function($q){
				$q->select( [ DB::raw('DATE_FORMAT(FROM_DAYS(TO_DAYS(now()) - TO_DAYS(accounts.birthdate)), "%Y") + 0 as age') , 'accounts.*' ] );
			}, 'Bio','Experience','Availability','Skill','Days'])->where('id',$id)->first();

		$aDayShifts = [];
		if( $this->data['oBabySitter']->Days->count() > 0 )
		{
			foreach( $this->data['oBabySitter']->Days as $oDay )
			{
				$aDayShifts[ $oDay->pivot->shift_id ][ $oDay->pivot->day_id ] = "on";
			}
		}
		
		if( $this->data['oBabySitter']->trashed()  )
            $this->data['sStatus'] = "archived";
		else if( $this->data['oBabySitter']->UserTypes->first()->pivot->is_approved_by_admin == "0" )
			$this->data['sStatus'] = "pending";
        else if( $this->data['oBabySitter']->UserTypes->first()->pivot->is_approved_by_admin == '1' )
            $this->data['sStatus'] = "approved";
        else if( $this->data['oBabySitter']->UserTypes->first()->pivot->is_approved_by_admin == '2' )
            $this->data['sStatus'] = "declined";
        
        $this->data['sStatus'] = ucfirst($this->data['sStatus']);

		$this->data['aDayShifts'] = $aDayShifts;
		$this->data['iSequenceId'] = 0;
		$this->data['iTotal'] = 0;
		$this->data['layout'] = 'layouts.admin';
		return $this->renderView( 'front.babysitter_profile' );
	}
}