<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AgentEarning;
use App\Models\User;
use DB;
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit( $id )
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update( $id )
	{
		//
	}

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

		$this->data[ 'year' ] = $year;
		return $this->renderView( 'admin.sales-agents.show' );
	}

	public function getShowEarningsMonthly( $id , $year = 0 , $month = 0 )
	{
		if ( $year == 0 )
			$year = date( 'Y' );

		if ( $month == 0 )
			$month = date( 'n' );

		$oSalesAgent = User::IsAgent()->where( 'id' , $id )->first();
		if ( !$oSalesAgent )
			return abort( '404' );

		$this->data[ 'oSalesAgent' ] = $oSalesAgent;
		$this->data[ 'aAgentEarnings' ] = AgentEarning::with( 'Deal' )->whereRaw( ' YEAR(`created_at`) = "' . $year . '"' )
			->where( 'agent_id' , $oSalesAgent->id )
			->whereRaw( ' MONTH(`created_at`) = "' . $month . '"' )
			->get();


		//dd(DB::getQueryLog());

		$this->data[ 'year' ] = $year;
		return $this->renderView( 'admin.sales-agents.show' );
	}
}
