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
use Illuminate\Http\Request;
use FormularioAplicacao\Http\Requests;



Route::group(['prefix' => 'client'], function(){
    Route::get('/', [ 'as' => 'clients' , 'uses' => 'ClientController@index']);
    Route::post('/', [ 'as' => 'clients' , 'uses' => 'ClientController@store']);
    Route::get('/{id}', [ 'as' => 'clients' , 'uses' => 'ClientController@show']);
    Route::put('/{id}', [ 'as' => 'clients' , 'uses' => 'ClientController@update']);
    Route::delete('/{id}', [ 'as' => 'clients' , 'uses' => 'ClientController@destroy']);
});