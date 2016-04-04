<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\studentRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Mail;
use App\student;

class registrationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	//function opens the student registration page
	public function studentRegPage()
	{
		return view('registerStudent');
	}

	//function stores the user in the database
	public function registerStudent(studentRequest $request)
	{
		//just store the users details in variables
		$studentName = $request->firstName;
		$studentId = $request->studentId;
		$campus = $request ->campus;
		$studentEmail = $studentId .'@buckingham.ac.uk';

		//encrypt the password
		$password = Crypt::encrypt($request ->password);

		//random confirmation code
		$confirmation_code = str_random(30);
		//pass confirmation code to an array
		$data =
			[
				'confirmation_code' => $confirmation_code,
				'studentEmail' => $studentEmail
			];


		//create the user, obvious init
		student::create([
			'firstName' => $studentName,
			'studentId' => $studentId,
			'campus' => $campus,
			'confirmation_code' => $confirmation_code,
			'password' => $password
		]);

		//send mail to user with confirmation code to confirm he's a student
		Mail::send('emails.verifyEmail', $data, function($message) {
			$message->from('DoNotReply@rideAlong.com', 'Do Not Reply');
			$message->to(Input::get('studentId').'@buckingham.ac.uk', Input::get('firstName'))->subject('Verify your email address');
		});


		//flash message to show in the home page
		Session::flash('flash_message','Please check your email to confirm your identity');

		//return view has some strange issue after a post request
		//Please check it out if ur interested in understanding the issue
		//return view('home');

		//So I just use redirect to make life easier for myself
		return Redirect::action('HomeController@index');
	}

	//function is for when user clicks on the link on the registration confirmation email
	public function confirm($confirmation_code)
	{
		//if there's no confirmation code throw an error
		if( !$confirmation_code)
		{
			throw new InvalidConfirmationCodeException;
		}

		//get the student with that confirmation code from student table
		$student = student::where('confirmation_code', '=', $confirmation_code)->first();


		if ( !$student)
		{
			throw new InvalidConfirmationCodeException;
		}

		$student->confirmed = 1;
		$student->confirmation_code = null;
		$student->save();

		Session::flash('flash_message','Your email address has been verified');
		return Redirect::action('HomeController@index');
	}
}
