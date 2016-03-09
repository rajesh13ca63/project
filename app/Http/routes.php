<?php

Route::post('UpdateInfo', 'GridController@UpdateInfo');
Route::get('manageprivilegejs', 'PrivilegeController@manageprivilege');

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', function () {
    return view('welcome');
    });
    Route::get('roleresourceperm', function() {
        return view('role');
    });
    Route::get('privilege', function() {
        return view('privilege')->middleware('isAdmin');
    });
    Route::get('profile', function () {
    return view('profile')->middleware('auth');
    });
   
    Route::get('home', 'HomeController@index'); 
    Route::get('display', 'UserController@display') ->middleware('auth');
    Route::get('allusers', 'RolePrivilegController@usersinfo')
    ->middleware('isAdmin');
    Route::get('getupdate', 'UserController@getupdate')->middleware('auth');
    Route::post('getupdate', 'UserController@update')->middleware('auth');
    //Routes are using for Role,Resource and Management
    Route::get('privilege', 'RolePrivilegController@privilegeusers') 
    ->middleware('isAdmin');
    Route::get('roleresourceperm', 'RolePrivilegController@roleresperm')
    ->middleware('isAdmin');;
    Route::post('roleresourceperm', 'RolePrivilegController@newroleresperm')->middleware('isAdmin');
    Route::get('allusers', 'RolePrivilegController@usersinfo')
    ->middleware('isAdmin');
    //Routes are using for Grid Management
    Route::get('griduers', 'GridController@gridusers')
    ->middleware('isAdmin');
    Route::get('griddemo', function() { return view('grid');  })
    ->middleware('isAdmin');;
    Route::get('allTweets', 'TweetsController@viewTweets'); 
    Route::get('privilegepost', 'PrivilegeController@privilegpost')
    ->middleware('isAdmin');;
    Route::post('postrole', 'RolePrivilegController@rolechange')
    ->middleware('isAdmin');
});