<?php
/*
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('profile', function () {
    return view('profile');
});

Route::get('roleresourceperm', function() {
 	return view('role');
});
Route::get('privilege', function() {
    return view('privilege');
});

Route::get('allusers', function() {
    return view('allusers');
});



Route::post('UpdateInfo', 'GridController@UpdateInfo');
Route::get('allusers', 'RolePrivilegController@usersinfo');
/*
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware r is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('display', 'UserController@display');
    Route::get('getupdate', 'UserController@getupdate');
    Route::post('getupdate', 'UserController@update');

    Route::get('griduers', 'GridController@gridusers');
    Route::get('griddemo', function() { return view('grid');  });
    Route::get('allTweets', 'TweetsController@viewTweets'); 

    Route::get('privilege', 'RolePrivilegController@privilegeusers');
    Route::get('roleresourceperm', 'RolePrivilegController@roleresperm');
    Route::get('allusers', 'RolePrivilegController@usersinfo');
    Route::get('rolechange', 'RolePrivilegController@rolechange');


});
