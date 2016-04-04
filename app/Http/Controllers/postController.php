<?php namespace App\Http\Controllers;

//Post a journey

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Http\Request;

class postController extends Controller
{
    public function postJourney(Request $request)
    {
        $success = DB::table('posts')->insert(['studentId' => $request->studentId,
                                               'destination' => $request->destination,
                                               'dateTime' => $request->date]);
        return (string)$success;
    }
}

?>