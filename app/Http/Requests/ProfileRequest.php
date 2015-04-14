<?php namespace App\Http\Requests;

use Auth;
class ProfileRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'firstname' =>  'required',
		    'lastname'  =>  'required',
		    'email'     =>  'required|email|unique:users,email,'.Auth::user()->id,
		    'profile'   =>  'image|mimes:jpg,png,jpeg'
		];
	}

}
