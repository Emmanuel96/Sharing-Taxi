<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('login','loginController@login');

Route::get('postJourney', 'postController@postJourney');

Route::get('acceptRequest','requestController@acceptRequest');

Route::get('rejectRequest', 'requestController@rejectRequest');

Route::post('ajaxState', 'requestController@doesRequestExist');

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('searchResults', 'searchController@search');

//Route opens the registration page
Route::get('registerStudents','registrationController@studentRegPage');

//Route handles storing a new user in database
Route::post('registerStudents','registrationController@registerStudent');

//This handles the email confirmation
Route::get('register/verify/{confirmationCode}','RegistrationController@confirm');

//request to check for request for logged in users post
Route::get('loggedInUsersRequestNotification', 'requestController@checkForRequest');
//AC: CHANGE THIS TO POSTS AND REQUESTS? CREATE SEPARATE CONTROLLERS OR REUSE POSTCONTROLLER

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
