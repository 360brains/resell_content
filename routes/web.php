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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('admin/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'namespace' => 'admin', 'as' => 'admin.'], function (){

    Route::resource('categories', 'CategoryController');
    Route::resource('tasks', 'TaskController');
    Route::resource('projects', 'ProjectController');
    Route::resource('levels', 'LevelController');
    Route::resource('test', 'TestController');

});
