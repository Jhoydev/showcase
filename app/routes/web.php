<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('escaparates',  'EscaparateController');
Route::get('escaparates',  'EscaparateController@index');
Route::post('escaparates/previous','EscaparateController@previous')->name('showcase.previous')->middleware('auth');
Route::get('/escaparates/create',  'EscaparateController@create')->middleware('auth');
Route::resource('profile', 'UserController')->middleware('auth');
Route::put('genera-new-apikey', 'UserController@generateNewApiKey')->name('profile.generateNewApiKey')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/upload/images/{any}','ImageController@show')->where('any','.*');
Route::post('upload/file/xml', 'EscaparateController@uploadXML');
Route::get('properties','PropertyController@index');
