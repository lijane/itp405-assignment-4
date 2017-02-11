<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TweetController extends Controller
{
    public function index(){
    	    $tweets = DB::table('tweets')
    		->select('id','tweet')
    		->orderBy('id','DESC')
    		->get();

 		 //resources/views/tweets/index.blade.php
    	return view('tweets.index',[
    		'tweets' => $tweets
    	]); 
    }

    public function store(Request $request){
    	// dd('hi');

		$validation = Validator::make($request->all()
		/*[
			'tweet' => request('tweettext'),
		]*/,[
			'tweettext' => 'required|max:140',
		]);

		if ($validation->passes()){

	    	DB::table('tweets')->insert([
				'tweet' => request('tweettext'),
			]);

			return redirect('/')
				->with('successStatus','Tweet successfully created!');
			}

		else {
			return redirect('/')
				->withErrors($validation);
		}
    }

     public function destroy($tweetID){
		DB::table('tweets')
			->where('id','=', $tweetID)
			->delete();

		return redirect('/')
			->with('successStatus','Tweet was deleted successfully!');
	}

	public function view($tweetID){
		$tweet = DB::table('tweets')
			->where('id','=', $tweetID)
			->first();

		// dd($tweet);

		return view('tweets.view',[
			'tweet' => $tweet
		]);
	}
}















