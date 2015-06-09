<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Request;
class RatingsController extends Controller
{
	public function __constuct()
	{
		$this->middleware('auth');
	}

	public function store()
	{
		$data = Request::all();
		Rating::create($data);
		return response()->json(['success'=>'true','message'=>'Your rating has been submitted!']);
	}
}