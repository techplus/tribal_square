<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AgentEarning;
use App\Models\User;
use DB;
use Session;
use Illuminate\Http\Request;


class AgentEarningsController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data[ 'aSalesAgents' ] = User::IsAgent()->get();

		return $this->renderView( 'admin.sales-agents.index' );
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
		return $this->renderView( 'admin.sales-agents.show' );
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
		return $this->renderView( 'admin.sales-agents.show_earnings' );
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
			return redirect()->action( 'Admin\AgentEarningsController@getShowEarnings' , [ $id , $year ] )->with('success','Payment mark as read successfully');
		}

		return redirect()->action( 'Admin\AgentEarningsController' , [ $id ] )->with('error','Some error occured , try again');
	}
}
