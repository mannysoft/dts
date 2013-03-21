<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Repositories
App::bind('DocumentRepositoryInterface', 'EloquentDocumentRepository');

Route::get('/', function()
{
	return View::make('hello');
});

//Route::get('user/{id}', 'UserController@showProfile');
//Route::get('user/{id}', 'UserController@showProfile');

// Login
Route::any('login', 			'LoginController@login');
Route::any('login/yeah', 		'LoginController@yeah');


// Document
Route::any('document', 				'DocumentController@index');
Route::any('document/create', 		'DocumentController@create');
Route::any('document/receive', 		'DocumentController@receive');
Route::any('document/info/{id}',	'DocumentController@info');
Route::any('document/my', 			'DocumentController@my');

Route::any('document/{id}', 		'DocumentController@edit');


//Route::post('login', 'LoginController@login');


