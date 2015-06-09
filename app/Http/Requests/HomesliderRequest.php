<?php namespace App\Http\Requests;

use Auth;
class HomesliderRequest extends Request {

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
			'slider_img'   =>  'image|mimes:jpg,png,jpeg',
			'slider_title' =>  'required',
		    'slider_link'  =>  'required'
		];
	}

}
