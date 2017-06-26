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
Route::group(['prefix' => 'client'], function(){
    Route::get('/', [ 'as' => 'clients.lista' , 'uses' => 'ClientController@index']);
    Route::post('/', [ 'as' => 'clients.store' , 'uses' => 'ClientController@store']);
    Route::get('/{id}', [ 'as' => 'clients.mostrar' , 'uses' => 'ClientController@show']);
    Route::put('/{id}', [ 'as' => 'clients.update' , 'uses' => 'ClientController@update']);
    Route::delete('/{id}', [ 'as' => 'clients.delete' , 'uses' => 'ClientController@destroy']);
});

Route::group(['prefix' => 'project'], function(){
    Route::get('/', [ 'as' => 'projects' , 'uses' => 'ProjectController@index']);
    Route::post('/', [ 'as' => 'projects' , 'uses' => 'ProjectController@store']);
    Route::get('/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectController@show']);
    Route::put('/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectController@update']);
    Route::delete('/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectController@destroy']);
});


Route::group(['prefix' => 'project_notes'], function(){
    Route::get('/', [ 'as' => 'projects' , 'uses' => 'ProjectNotesController@index']);
    Route::post('/', [ 'as' => 'projects' , 'uses' => 'ProjectNotesController@store']);
    Route::get('/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectNotesController@show']);
    Route::put('/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectNotesController@update']);
    Route::delete('/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectNotesController@destroy']);
});