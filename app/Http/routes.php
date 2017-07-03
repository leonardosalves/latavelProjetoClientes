<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('ouath/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});


Route::group(['middleware' => 'oauth'], function() {
    Route::group(['prefix' => 'client'], function(){
        //Route::get('/', 'ClientController@index',['except' => ['create', 'edit']]);
        //Retorna todos projetos deste client
        Route::get('/projects/{id}', ['as' => 'clients.projects', 'uses' => 'ClientController@AllProjects']);
        Route::post('/', [ 'as' => 'clients.store' , 'uses' => 'ClientController@store']);
        Route::get('/{id}', [ 'as' => 'clients.mostrar' , 'uses' => 'ClientController@show']);
        Route::put('/{id}', [ 'as' => 'clients.update' , 'uses' => 'ClientController@update']);
        Route::delete('/{id}', [ 'as' => 'clients.delete' , 'uses' => 'ClientController@destroy']);
    });
    Route::group(['prefix' => 'project','middleware' => 'CheckProjectOwner'], function(){
        //Route::get('/', 'ProjectController@index',['except' => ['create', 'edit']]);
        
        Route::get('/', [ 'as' => 'projects' , 'uses' => 'ProjectController@index']);
        Route::post('/', [ 'as' => 'projects' , 'uses' => 'ProjectController@store']);
        Route::get('/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectController@show']);
        Route::put('/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectController@update']);
        Route::delete('/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectController@destroy']);
    });
    Route::group(['prefix' => 'project_notes'], function(){
        //Route::get('/allnotes', [ 'as' => 'projects' , 'uses' => 'ProjectNotesController@allNotes']);
        //Retorna todas notas deste projeto
        Route::get('/allnotes', [ 'as' => 'projects' , 'uses' => 'ProjectNotesController@allNotes']);
        Route::get('/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectNotesController@index']);
        Route::post('/', [ 'as' => 'projects' , 'uses' => 'ProjectNotesController@store']);
        //Especifica uma nota 
        Route::get('/show/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectNotesController@show']);
        Route::put('/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectNotesController@update']);
        Route::delete('/{id}', [ 'as' => 'projects' , 'uses' => 'ProjectNotesController@destroy']);
    });
});


