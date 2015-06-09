<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\AddAdminRequest;
use App\Models\UserType;
use App\Models\Content;
use Validator;
use Request;
use Mail;
use Session;

class ContactUsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data['content']['location'] = Content::where('content_title','contact_us_location')->first();
		$this->data['content']['phone'] = Content::where('content_title','contact_us_phone')->first();
		return $this->renderView('admin.contents.contact_us');
	}

	public function store()
	{
		$content = Content::where('content_title','contact_us_location')->first();
		$data = array('content_title'=>'contact_us_location','descriptions'=>Request::input('location'));
		if( ! $content )
			Content::create($data);
		else
		{
			$content->descriptions = Request::input('location');
			$content->save();
		}

		$content = Content::where('content_title','contact_us_phone')->first();
		$data = array('content_title'=>'contact_us_phone','descriptions'=>Request::input('phone_no'));
		if( ! $content )
			Content::create($data);
		else
		{
			$content->descriptions = Request::input('phone_no');
			$content->save();
		}
		return redirect()->route('admin.contact-us.index')->with('success','Contact us details updated!');
	}

}
