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


Auth::routes();

Auth::routes(['verify' => true]);

Route::get('admin/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'namespace' => 'admin', 'as' => 'admin.'], function (){

    Route::resource('transactions', 'TransactionController');
    Route::resource('categories', 'CategoryController');
    Route::resource('trainings', 'TrainingController');
    Route::resource('projects', 'ProjectController');
    Route::resource('levels', 'LevelController');
    Route::resource('users',  'UserController');
    Route::resource('test', 'TestController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], ['verify' => true]], function() {
    Route::get('user/dashboard', 'User\DashboardController@index')->name('user.dashboard');
    Route::get('user/profile', 'User\ProfileController@index')->name('user.profile');
    Route::get('user/transactions', 'User\transactionController@index')->name('user.transactions');
    Route::get('user/tasks', 'User\tasksController@index')->name('user.tasks');
    Route::get('user/tasks/take/{id}', 'User\tasksController@taskTake')->name('user.tasks.take');
    Route::post('user/profile/edit-personal', 'User\ProfileController@editPersonal')->name('user.profile.edit.personal');
    Route::post('user/profile/edit-password', 'User\ProfileController@editPassword')->name('user.profile.edit.password');
});


Route::get('/', 'Pages\PagesController@home')->name('pages.home');
Route::get('/projects', 'Pages\PagesController@projects')->name('pages.projects');
Route::get('/project-details/{id}', 'Pages\PagesController@projectDetails')->name('pages.project.details');
Route::get('/projects-category/{id}', 'Pages\PagesController@projectsByCategories')->name('pages.projects.category');
Route::get('/pricing', 'Pages\PagesController@pricing')->name('pages.pricing');
Route::get('/tutorials', 'Pages\PagesController@tutorials')->name('pages.tutorials');
Route::get('/trainings', 'Pages\PagesController@trainings')->name('pages.trainings');




