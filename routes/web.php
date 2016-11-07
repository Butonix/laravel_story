<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('user.home');
});

Route::group(['prefix' => 'category'], function() {
  Route::get('{id}', function($id) {
    return view('user.category')->with('id', $id);
  });
});
