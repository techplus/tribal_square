<?php namespace App\Http\Controllers;

use App\Models\ListingCategory;
use Request;
use App\Http\Controllers\Controller;
use App\Models\Classified;
class ClassifiedsController extends Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['categories'] = ListingCategory::classified()->get();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aSearch = session('search');
		$oDealsBuilder = Classified::approved()->with(['ClassifiedImages'=>function($q){
			$q->where('is_cover',1);
		},'ListingCategory']);
		if( ! empty( $aSearch['term'] ) )
			$oDealsBuilder = $oDealsBuilder->term($aSearch['term']);
		if( ! empty( $aSearch['location'] ) )
			$oDealsBuilder = $oDealsBuilder->where('location','LIKE','%'.$aSearch['location'].'%');

			$oDealsBuilder = $oDealsBuilder->whereHas('ListingCategory',function($q) use( $aSearch ){
				$q->where('name','LIKE','%'.$aSearch['term']."%");
			});
		$classifieds = $oDealsBuilder->get();
		$aViewData = array();
		foreach( $classifieds AS $classified)
		{
			$aViewData[$classified->ListingCategory->name][] = $classified;
		}
		$this->data['classifieds'] = $aViewData;
		return $this->renderView('front.search_classified');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$classified = Classified::with(['ClassifiedImages','ListingCategory'])->find($id);
		if( ! $classified )
			return abort(404);
		$this->data['classified'] = $classified;
		return $this->renderView('front.classified_full_view');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
