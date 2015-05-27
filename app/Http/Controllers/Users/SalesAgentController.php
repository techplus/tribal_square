<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use App\Models\AgentEarning;
use App\Http\Requests\SalesagentRequest;
use Request;
use Auth;
use DB;
use App\Http\Requests\ProfileRequest;




class SalesAgentController extends Controller
{
	public function index()
	{
		$this->data[ 'oUser' ] = Auth::user();

		$oUserType = Auth::user()->UserTypes()->where('user_usertypes.user_id' , '=' , $this->data['oUser']->id )->first();

		if( $oUserType )
		{
		 	$this->data[ 'oUserType' ] = $oUserType;
		}	
		return $this->renderView('agents.index');
	}

	public function update(SalesagentRequest $request, $id)
	{
		$id = Auth::user()->id;
		if( $request->hasFile('profile') )
		{
			@unlink(base_path('profile_pictures/'.$id.".png"));
			@unlink(base_path('profile_pictures/'.$id.".jpg"));
			@unlink(base_path('profile_pictures/'.$id.".jpeg"));
			$file = $request->file('profile');
			$file->move(base_path('profile_pictures'),$id.".".$file->getClientOriginalExtension());
		}
		$user = User::find($id);
		$user->firstname = $request->input('firstname');
		$user->lastname = $request->input('lastname');
		$user->email = $request->input('email');
		$password = $request->input('password');
		if( !empty( $password ) )
			$user->password = $request->input('password');
		$user->save();

		
		$paypal = $request->input('paypalid');
		if( Request::has ( 'paypalid' ) )
		{
			$update = Auth::user()->find($id); 
			$update_imei = $update->UserTypes()->where('user_usertypes.user_id','=',$id)->first(); 
			$update_imei->pivot->paypalid = $request->input('paypalid');
			$update_imei->pivot->save();

		}
		return redirect()->back()->with('success','Settings updated successfully');
	}

	/**
	 * @param $id
	 * @param int $year
	 * @return \Illuminate\View\View|void
	 */
	public function getShowEarnings( $id , $year = 0 )
	{
		if ( $year == 0 )
			$year = date( 'Y' );

		$oSalesAgent = User::IsAgent()->where( 'id' , $id )->first();
		if ( !$oSalesAgent )
			return abort( '404' );

		$this->data[ 'oSalesAgent' ] = $oSalesAgent;
		$this->data[ 'aAgentEarnings' ] = AgentEarning::select( [ DB::raw( 'sum(`amount_earned`) AS earning' ) , DB::Raw( 'MONTHNAME(`created_at`) AS month' ) , DB::Raw( 'MONTH(`created_at`) AS MONTH' ) , 'has_paid_out' ] )
			->whereRaw( ' YEAR(`created_at`) = "' . $year . '"' )
			->where( 'agent_id' , $oSalesAgent->id )
			->groupby( [ DB::Raw( 'MONTH(`created_at`)' ) ] )
			->get();

		$this->data[ 'id' ] = $id;
		$this->data[ 'year' ] = $year;
		return $this->renderView( 'agents.show_earn' );
	}

	/**
	 * @param $id
	 * @param int $year
	 * @param int $month
	 * @return \Illuminate\View\View|void
	 */
	public function getShowEarningsMonthly( $id , $year = 0 , $month = 0 )
	{
		if ( $year == 0 )
			$year = date( 'Y' );

		if ( $month == 0 )
			$month = date( 'n' );

		$oSalesAgent = User::IsAgent()->where( 'id' , $id )->first();
		if ( !$oSalesAgent )
			return abort( '404' );

		$monthNum = $month;
		$this->data[ 'monthName' ] = date( 'F' , mktime( 0 , 0 , 0 , $monthNum , 10 ) ); // March

		$this->data[ 'oSalesAgent' ] = $oSalesAgent;
		$this->data[ 'aAgentEarnings' ] = AgentEarning::with( 'Deal' , 'Transaction' )->whereRaw( ' YEAR(`created_at`) = "' . $year . '"' )
			->where( 'agent_id' , $oSalesAgent->id )
			->whereRaw( ' MONTH(`created_at`) = "' . $month . '"' )
			->get();

		$this->data[ 'id' ] = $id;
		$this->data[ 'month' ] = $month;
		$this->data[ 'year' ] = $year;
		return $this->renderView( 'agents.show_earn_monthly' );
	}

	/**
	 * @param $id
	 * @param $year
	 * @param $month
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function getUpdateEarning( $id , $year , $month )
	{

		if( $year and $month ) {
			AgentEarning::whereRaw( 'MONTH(created_at) = "' . $month . '"' )
				->whereRaw( 'YEAR(created_at) = "' . $year . '"' )
				->where( 'has_paid_out' , 0 )
				->update( [ 'has_paid_out' => 1 ] );
			return redirect()->action( 'Users\SalesAgentController@getShowEarnings' , [ $id , $year ] )->with('success','Payment mark as read successfully');
		}

		return redirect()->action( 'Users\SalesAgentController' , [ $id ] )->with('error','Some error occured , try again');
	}
}