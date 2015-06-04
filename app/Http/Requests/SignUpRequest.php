<?php namespace App\Http\Requests;

class SignUpRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'user_type'	=>	'required',
			'firstname'	=>	'required',
			'lastname'	=>	'required',
			'email'		=>	'required|email|unique:users,email',
			'password'	=>	'required|confirmed',
			'agreement'	=>	'required',
			'g-recaptcha-response' => 'required|captcha'
		];
	}

	public function response(array $errors)
	{
		if ($this->ajax() || $this->wantsJson())
		{
			$errors['captcha'] = app('captcha')->display();
			return response()->json($errors,422);
		}

	}

}
