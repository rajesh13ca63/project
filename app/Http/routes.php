<?php

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', function () {
    return view('welcome');
    });
    Route::get('roleresourceperm', function() {
        return view('role')->middleware('isAdmin');
    });
    Route::get('privilege', function() {
        return view('privilege')->middleware('isAdmin');
    });
    Route::get('profile', function () {
    return view('profile')->middleware('auth');
    });
   
    Route::get('home', 'HomeController@index')->middleware('auth'); 
    Route::get('display', 'UserController@display') 
    ->middleware('auth');
    Route::post('UpdateInfo', 'GridController@UpdateInfo')
    ->middleware('auth');
    Route::get('allusers', 'RolePrivilegController@usersinfo')
    ->middleware('isAdmin');
    Route::get('getupdate', 'UserController@getupdate')->middleware('auth');
    Route::post('getupdate', 'UserController@update')->middleware('auth');
    
    //Routes are using for Role,Resource and Management
    Route::get('privilege', 'RolePrivilegController@privilegeusers') 
    ->middleware('isAdmin');
    Route::get('roleresourceperm', 'RolePrivilegController@roleresperm')
    ->middleware('isAdmin');;
    Route::post('roleresourceperm', 'RolePrivilegController@newroleresperm')
    ->middleware('isAdmin');
    Route::get('allusers', 'RolePrivilegController@usersinfo')
    ->middleware('isAdmin');
    
    //Routes are using for Grid Management
    Route::get('griduers', 'GridController@gridusers')->middleware('isAdmin');
    Route::get('griddemo', function() { return view('grid');  })
    ->middleware('isAdmin');
    Route::get('allTweets', 'TweetsController@viewTweets')->middleware('auth'); 
    
    /*Routes are using here for Admin control Privilege and Role Assigned to the exiting users
    */
    Route::get('privilegepost', 'PrivilegeController@privilegpost')
    ->middleware('isAdmin');;
    Route::post('postrole', 'RolePrivilegController@rolechange')
    ->middleware('isAdmin');
    Route::get('manageprivilegejs', 'PrivilegeController@manageprivilege')
    ->middleware('isAdmin');

    //Using here twilio
    Route::get('sendmessage', 'TwilioController@sendmessage');
});