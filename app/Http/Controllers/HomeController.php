<?php namespace App\Http\Controllers;

use App\Models\ListingCategory;
use Request;
use DB;
use App\Models\Deal;
use Image;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{		
//		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$this->data['aLatestDeals'] = Deal::with( [ 'CoverPic' ] )->approved()->future()->orderBy('is_deal_of_the_day','DESC')->orderBy('updated_at','DESC')->take(4)->get();

		$this->data['body_class'] = 'home_page_body';
		return $this->renderView('front.home');
	}

	public function getTerms()
	{
		return $this->renderView('front.terms');
	}

	public function getRefundpolicy()
	{
		return $this->renderView('front.refundpolicy');
	}
	public function getPrivacypolicy()
	{
		return $this->renderView('front.privacypolicy');
	}

}
