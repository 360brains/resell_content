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

    Route::resource('transactions', 'TransactionController');
    Route::resource('categories', 'CategoryController');
    Route::resource('trainings', 'TrainingController');
    Route::resource('projects', 'ProjectController');
    Route::resource('levels', 'LevelController');
    Route::resource('users',  'UserController');
    Route::resource('tasks', 'TaskController');
    Route::resource('test', 'TestController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user/dashboard', 'User\DashboardController@index')->name('user.dashboard');

Route::group(['prefix' => 'user', 'middleware' => 'auth:user', 'namespace' => 'user', 'as' => 'user.'], function (){

});
