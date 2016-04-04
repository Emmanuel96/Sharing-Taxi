<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class studentRequest extends Request {

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
			'firstName' => 'required|string',
			'studentId' => 'unique:students,studentId|required|string',
			'phoneNumber' => 'digits:11',
			'campus' => 'required|string',
			'password' => 'required|confirmed|min:6',
			'password_confirmation' => 'required',
		];
	}

}
