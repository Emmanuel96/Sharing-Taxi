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

	//create Request
	public function createRequest(Request $request)
	{
		//for now student request is automatically 16000425
		$requestStatus = 0;
		$postId = $request->postId;
		$studentId = $request->studentId;


		requestsModel::create([
			'postId' => $postId,
			'studentId' =>$studentId,
			'requestStatus' => $requestStatus
		]);

		return 'success guys';
	}
}
