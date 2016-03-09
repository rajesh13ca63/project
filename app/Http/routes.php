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
        return view('privilege');
    });
    Route::get('profile', function () {
    return view('profile');
    });
});

Route::group(['middleware' => 'web'], function () {
    Route::get('home', 'HomeController@index'); 
    Route::get('display', 'UserController@display');
    Route::get('allusers', 'RolePrivilegController@usersinfo');
    Route::get('getupdate', 'UserController@getupdate');
    Route::post('getupdate', 'UserController@update');
    //Routes are using for Role,Resource and Management
    Route::get('privilege', 'RolePrivilegController@privilegeusers');
    Route::get('roleresourceperm', 'RolePrivilegController@roleresperm');
    Route::post('roleresourceperm', 'RolePrivilegController@newroleresperm');
    Route::get('allusers', 'RolePrivilegController@usersinfo');
    //Routes are using for Grid Management
    Route::get('griduers', 'GridController@gridusers');
    Route::get('griddemo', function() { return view('grid');  });
    Route::get('allTweets', 'TweetsController@viewTweets'); 
    Route::get('privilegepost', 'PrivilegeController@privilegpost');
    Route::post('postrole', 'RolePrivilegController@rolechange');
});