<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::resource('escaparates',  'EscaparateController');
Route::post('escaparates/previous','EscaparateController@previous')->name('showcase.previous')->middleware('auth');
Route::get('/escaparates/create',  'EscaparateController@create')->middleware('auth','verified');
Route::resource('profile', 'UserController')->middleware('auth');
Route::put('genera-new-apikey', 'UserController@generateNewApiKey')->name('profile.generateNewApiKey')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/upload/images/{any}','ImageController@show')->where('any','.*');

// Properties
Route::get('properties','PropertyController@index');
Route::post('upload/file/xml', 'PropertyController@uploadXML');
