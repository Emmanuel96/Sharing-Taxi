<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\student;

class searchController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for students that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instapaginate(*
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	public function search(Request $request)
	{
		//default studentId id for now is 1600428
		$studentId = 1600428;

		$studentsRequests = student::find($studentId)->requests;

		//get the destination and the currentLocation
		$currentLocation = $request->currentLocation;
		$destination = $request->destination;


		//query the table for the search
		$searchResults = DB::table('posts')->where('destination','LIKE',$destination)
			->orwhere('campus','LIKE',$currentLocation)->paginate(10);

		$searchResults = DB::table('posts')->paginate();

		//send results to the search result view and array of student requests
		return view('searchResults')->with(compact('searchResults', 'studentsRequests'));
	}

}
