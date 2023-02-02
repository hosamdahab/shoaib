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

Route::prefix('dashboard')->middleware('auth')->group(function() {

    Route::get('/','AdminController@dashboard')->name('dashboard.index');
    
    Route::get('projects/index','ProjectController@index')->name('projects.index');
    Route::get('projects/create','ProjectController@create')->name('project.create');
    Route::post('projects/store','ProjectController@store')->name('project.store');
    Route::get('projects/datatable','ProjectController@datatable')->name('projects.datatable');

    Route::get('projects/edit/{id}','ProjectController@edit')->name('projects.edit');
    Route::get('projects/show/{id}','ProjectController@show')->name('projects.show');
    Route::post('projects/update/{id}','ProjectController@update')->name('project.update');
    Route::get('projects/destroy/{id}','ProjectController@destroy')->name('projects.destroy');
    Route::post('projects/edit/{id}','ProjectController@update')->name('projects.edit');


    
    

});
