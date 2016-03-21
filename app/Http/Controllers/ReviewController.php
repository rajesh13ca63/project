<?php
namespace App\Http\Controllers;

use DB;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class ReviewController extends Controller {
    public function review(Request $request) {
        $user = User::find(Auth::user()->id);
        $id = $user->id;
        $post = NULL;

        $roles = DB::table('users')
    	          ->select('role')
                  ->where('id', $id)
    	          ->first();

    	$post = DB::table('users')
	              ->join('reviews', 'users.id', '=', 'reviews.user_id')
                  ->select('users.name', 'users.image', 'reviews.review_name',
                    'reviews.review_id', 'reviews.like')
                  ->orderBy ('reviews.review_id', 'desc') 
		          ->get();
		
    	return view('review', array('post' => $post, 'roles' => $roles));
    }
  
    //This is the method to storesl all comments into the database
	public function reviewPost(Request $request) {
		$operation = $request['submit'];
		$comment = $request['post'];
		$like = $request->input('like');
        $reviewid = $request['review_id'];

		$user = User::find(Auth::user()->id);
        
        //Here checking the conddition if clicking on Comment button
		if ($operation == 'comment') {
        	DB::table('reviews')
        	  ->insert([
                       'user_id' => $user->id,
                       'review_name' => $comment
        	  	       ]);
        	 return redirect('review');
        }

        //Here checking the conddition if clicking on Like button
        if ($operation == 'like') {
             $likes = DB::table('reviews')
               ->where('review_id', $reviewid)
               ->select('like')
               ->first();

             DB::table('reviews')
               ->where('review_id', $reviewid)
               ->update([
                        'like'=> $likes->like+1]);
                
                return redirect('review');
        }
 
	}
    
}
