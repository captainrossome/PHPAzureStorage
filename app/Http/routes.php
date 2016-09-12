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


Route::get('/', array('as' => 'homes.index', 'uses' => 'HomeController@index'));

Route::resource("homes","HomeController");

Route::get('/azures', array('as' => 'azures.index', 'uses' => 'AzureController@index'));

Route::get('/azures/upload', array('as' => 'azures.upload', 'uses' => 'AzureController@upload'));
Route::post('/azures/createBlob', array('as' => 'azures.createBlob', 'uses' => 'AzureController@createBlob'));

Route::post('/azures/destroy', array('as' => 'azures.destroy', 'uses' => 'AzureController@delete'));