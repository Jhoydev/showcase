<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('escaparates',  'EscaparateController');
Route::get('escaparates',  'EscaparateController@index');
Route::post('escaparates/{escaparate}','EscaparateController@previous');
Route::get('/escaparates/create/{client}',  'EscaparateController@create');

Route::get('/profile','UserController@profile')->name('profile')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');
