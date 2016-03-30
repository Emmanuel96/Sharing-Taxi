<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\requestsModel;

use Illuminate\Http\Request;


class requestController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function createRequest($postId, $studentId, $requestStatus)
	{
		//then create the request
		requestsModel::create([
			'postId' => $postId,
			'studentId' =>$studentId,
			'requestStatus' => 0
		]);
		return 'success';
	}


	//create Request
	public function doesRequestExist(Request $request)
	{

		//for now student request is automatically 1600428
		$requestStatus = 0;
		$postId = $request->postId;
		$studentId = $request->studentId;

		//check the db for the request
		$requestFromDb = DB::table('requests')->where('studentId','=', $studentId)
			->where('postId','=',$postId);

		//if the request doesnt exist
		if($requestFromDb->count() != 0)
		{
			//delete reqeust from table
			$requestFromDb->delete();
			return 'deleted';
		}
		else{
			requestsModel::create([
				'postId' => $postId,
				'studentId' =>$studentId,
				'requestStatus' => 0
			]);
			return 'success';
		}
	}

	public function acceptRequest(Request $request )
	{
		$studentId = $request->studentId;
		$postId = $request->postId;

		////change the request status to 1
		//meaning its been accepted
		$request = DB::table('requests')->where('studentId','=',$studentId)
			->where('postId','=',$postId)->update(array('requestStatus' => 1));
	}

	public function rejectRequest(Request $request )
	{
		$studentId = $request->studentId;
		$postId = $request->postId;

		//change the request status to 2
		//meaning its been rejected
		$request = DB::table('requests')->where('studentId','=',$studentId)
			->where('postId','=',$postId)->update(array('requestStatus' => 2));
	}

	public function checkForRequest()
	{
		//Normally we would use the logged in user but user for now we use student id
		$studentId = 1600428;

		//get all the request for the logged in student
		$studentRequests = DB::table('requests')->where('studentId','LIKE',$studentId)->get();

		$resultsInJson = json_encode($studentRequests);
		return $resultsInJson;
	}
}
