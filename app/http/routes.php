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

Route::get('/', 'TopicController@index');
Route::get('/home/', 'TopicController@index');
Route::get('/edit/{id}', 'TopicController@edit');
Route::get('/create/', 'TopicController@create');
Route::get('/createblock/', 'BlockController@create');
Route::post('/createblock/', 'BlockController@store');
Route::get('/images/{filename}', function ($filename)
{
    $path = storage_path() . '/' . $filename;
    if(!File::exists($path)) abort(404);
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});
Route::resource('topic', 'TopicController');
