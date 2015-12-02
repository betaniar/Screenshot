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
Route::post('saveimage','mainController@postsaveImage');
Route::get('screenshot','mainController@getScreenshot');
Route::post('viewimage/{image}', function($myimage){
return Image::make($myimage)->response('png');
});
Route::get('/', function () {
    return view('welcome');
});
