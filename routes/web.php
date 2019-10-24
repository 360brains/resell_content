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

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'namespace' => 'admin', 'as' => 'admin.'], function (){

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('transactions', 'TransactionController');
    Route::resource('categories', 'CategoryController');
    Route::resource('trainings', 'TrainingController');
    Route::resource('projects', 'ProjectController');
    Route::resource('levels', 'LevelController');
    Route::resource('users',  'UserController');
    Route::resource('tasks', 'TaskController');
    Route::resource('test', 'TestController');
    Route::resource('templates', 'TemplateController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], ['verify' => true]], function() {
    Route::get('user/dashboard', 'User\DashboardController@index')->name('user.dashboard');
    Route::get('user/profile', 'User\ProfileController@index')->name('user.profile');
    Route::get('user/learn', 'User\LearnController@index')->name('user.learn');
    Route::get('user/learn-details/{id}', 'User\LearnController@learnDetails')->name('user.learn.details');
    Route::get('user/transactions', 'User\transactionController@index')->name('user.transactions');
    Route::get('user/tasks', 'User\tasksController@index')->name('user.tasks');
    Route::get('user/tasks/take/{id}', 'User\tasksController@taskTake')->name('user.tasks.take');
    Route::get('user/tasks/work', 'User\tasksController@work')->name('user.tasks.work');
    Route::post('user/tasks/save-progress/{id}', 'User\tasksController@saveProgress')->name('user.tasks.save.progress');
    Route::get('user/tasks/create-doc/{id}', 'User\OfficeController@createDoc')->name('user.tasks.create.doc');
    Route::post('user/tasks/upload-doc/{id}', 'User\OfficeController@uploadDoc')->name('user.tasks.upload.doc');
    Route::post('user/profile/edit-personal', 'User\ProfileController@editPersonal')->name('user.profile.edit.personal');
    Route::post('user/profile/edit-password', 'User\ProfileController@editPassword')->name('user.profile.edit.password');
});
Route::get('/', 'Pages\PagesController@home')->name('pages.home');
Route::get('/projects', 'Pages\PagesController@projects')->name('pages.projects');
Route::get('/howItWorks', 'Pages\PagesController@howItWorks')->name('pages.howItWorks');
Route::get('/project-details/{id}', 'Pages\PagesController@projectDetails')->name('pages.project.details');
Route::get('/projects-category/{id}', 'Pages\PagesController@projectsByCategories')->name('pages.projects.category');
Route::get('/pricing', 'Pages\PagesController@pricing')->name('pages.pricing');
Route::get('/tutorials', 'Pages\PagesController@tutorials')->name('pages.tutorials');
Route::get('/trainings', 'Pages\PagesController@trainings')->name('pages.trainings');

Route::get('paypal', 'PayPalController@index')->name('paypal');

Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');




