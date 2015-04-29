<?php namespace App\Http\Requests;

use Auth;
class AddAdminRequest extends Request
{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize ()
	{
		return Auth::user()->UserTypes()->get()->filter( function ( $q ) {
			return $q->name == 'SuperAdmin';
		} )->count() > 0;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules ()
	{
		return [
			'firstname' => 'required' ,
			'lastname'  => 'required' ,
			'email'     => 'required|email|unique:users,email' ,
			'password'  => 'required|confirmed'
		];
	}

}
