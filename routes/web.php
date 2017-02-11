<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','TweetController@index');
Route::post('/','TweetController@store'); // handle create song form submit
Route::get('/{id}/delete','TweetController@destroy');
Route::get('/tweets/{id}','TweetController@view');