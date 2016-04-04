<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class loginController extends Controller {

	//function opens the login page
	public function login()
	{
		return view('studentLogin');
	}

	//Method just handles the logging in for users
	//I just took their default function in the auth controller and edited it a bit
	public function postLogin(Request $request)
	{
		//validation for the student ID and password
		$this->validate($request, [
			'studentId' => 'required', 'password' => 'required',
		]);

		$credentials = $request->only('studentId', 'password');

		if (Auth::attempt($credentials, $request->remember)) {
			return Auth::user();
			return Redirect::action('HomeController@index');
		}

//		if ($this->auth->attempt($credentials, $request->has('remember')))
//		{
//			return redirect()->intended($this->redirectPath());
//		}

		return redirect($this->loginPath())
			->withInput($request->only('email', 'remember'))
			->withErrors([
				'email' => $this->getFailedLoginMessage(),
			]);
	}
}
