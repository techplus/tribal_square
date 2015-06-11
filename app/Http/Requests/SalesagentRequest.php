<?php namespace App\Http\Requests;

use Auth;
class SalesagentRequest extends Request {

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
		$user = $this->route()->getParameter('sales_agents') ? $this->route()->getParameter('sales_agents') : Auth::user()->id;

		return [
			'firstname' =>  'required',
		    'lastname'  =>  'required',
		    'email'     =>  'required|email|unique:users,email,'.$user,
		    'profile'   =>  'image|mimes:jpg,png,jpeg',
			'paypalid' =>  'required'
		];
	}

}
