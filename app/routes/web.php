<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('escaparates',  'EscaparateController');
Route::get('escaparates',  'EscaparateController@index');
Route::post('escaparates/{escaparate}',  'EscaparateController@previous');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
