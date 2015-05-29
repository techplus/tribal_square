<?php namespace App\Http\Controllers;

use App\Models\ListingCategory;
use Request;
use DB;
use App\Models\Deal;
use App\Models\Content;
use Image;
use App\Http\Requests\ContactUsRequest;
use Mail;
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
		$this->data['aFooterData'] = Content::all();
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$this->data['aFooterData'] = Content::all();

		$this->data['aLatestDeals'] = Deal::with( [ 'CoverPic' ] )->approved()->future()->orderBy('is_deal_of_the_day','DESC')->orderBy('updated_at','DESC')->take(4)->get();

		$this->data['body_class'] = 'home_page_body';
		return $this->renderView('front.home');
	}

	public function getTerms()
	{
		$this->data['aFooterData'] = Content::all();

		$this->data['aFooterTerms'] = Content::find(2);

		return $this->renderView('front.terms');
	}

	public function getRefundpolicy()
	{
		$this->data['aFooterData'] = Content::all();

		$this->data['aFooterRefund'] = Content::find(3);

		return $this->renderView('front.refundpolicy');
	}
	public function getPrivacypolicy()
	{
		$this->data['aFooterData'] = Content::all();

		$this->data['aFooterPrivacy'] = Content::find(1);

		return $this->renderView('front.privacypolicy');
	}

	public function getContactUs()
	{
		return $this->renderView('front.contact_us');
	}

	public function postContactUs(ContactUsRequest $request)
	{
		Mail::send('emails.contact_us',$request->all(),function($message){
			$message->to('info@techplussoftware.com','Techplus Software')->subject('Contact Request');
		});
		Mail::send('emails.contact_us',$request->all(),function($message){
			$message->to('admin@nettley.com','Nettley Software')->subject('Contact Request');
		});

		return redirect()->back()->with('success','Your request has been submitted, we will get back to you soon');
	}

}
