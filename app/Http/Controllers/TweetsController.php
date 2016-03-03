<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Twitter;
use DB;
//use App\Http\Requests;
use App\Http\Controllers\Controller;

class TweetsController extends Controller {
    
    function viewTweets(/*Requests $request*/) {
        $userid = 6;//$request['userid'];
	    $rows = DB::table('users')->where('id',$userid)->first();
	    $tweetid = $rows->tweet;
        $tweet = Twitter::getUserTimeline(['screen_name' => '@nytimes', 
		'count' => 20, 'format' => 'json']);
		 
		return $tweet;
	}     
}
