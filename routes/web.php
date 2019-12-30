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

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'namespace' => 'Admin', 'as' => 'admin.'], function (){

    Route::post('task/save-progress/{id}', 'TaskController@saveProgress')->name('task.save.progress');
    Route::get('task/extend/{id}', 'TaskController@extendTime')->name('task.extend');
    Route::get('user-test/show/{id}', 'UserTestController@showTest')->name('user.test.show');
    Route::get('user-tests', 'UserTestController@userTests')->name('user.tests');
    Route::post('user-test/evaluate/{id}', 'UserTestController@evaluate')->name('user.test.evaluate');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
//    Route::get('deposit-funds', 'TransactionController@depositIndex')->name('deposit.funds');
    Route::get('withrawRequests', 'TransactionController@withdrawIndex')->name('withrawRequests');
    Route::get('withdraw-approve{id}', 'TransactionController@withdrawApprove')->name('withdraw.approve');
    Route::get('notifications', 'NotificationController@index')->name('notifications');
    Route::post('users/special/{id}',  'UserController@addToSpecial')->name('users.special');
    Route::resource('transactions', 'TransactionController');
    Route::resource('memberships', 'MembershipController');
    Route::resource('categories', 'CategoryController');
    Route::resource('trainings', 'TrainingController');
    Route::resource('projects', 'ProjectController');
    Route::post('get-projects', 'ProjectController@getProjects')->name('get.projects');
    Route::resource('levels', 'LevelController');
    Route::resource('users',  'UserController');
    Route::post('get-users', 'UserController@getUsers')->name('get.users');
    Route::resource('tasks', 'TaskController');
    Route::resource('test', 'TestController');
    Route::resource('templates', 'TemplateController');
    Route::resource('accounts', 'AccountController');
    Route::resource('deposits', 'DepositController');

});

Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/home', 'HomeController@index')->name('home');
// ['auth', 'verified']
// Use when email setup is complete
Route::group(['middleware' => ['auth', 'active']], function() {
    Route::get('user/dashboard', 'User\DashboardController@index')->name('user.dashboard');
    Route::get('user/profile', 'User\ProfileController@index')->name('user.profile');
    Route::get('user/learn', 'User\LearnController@index')->name('user.learn');
    Route::get('user/memberships', 'User\MembershipController@index')->name('user.memberships');
    Route::get('user/memberships/buy/{id}', 'User\MembershipController@buy')->name('user.memberships.buy');
    Route::get('user/training/buy/{id}', 'User\TrainingController@buy')->name('user.training.buy');
    Route::get('user/voucher', 'User\VoucherController@index')->name('user.voucher');
    Route::get('user/payment', 'User\PaymentController@index')->name('user.payment');
    Route::get('user/add/account', 'User\PaymentController@addAccount')->name('user.add.account');
    Route::get('user/edit/account/{id}', 'User\PaymentController@editAccount')->name('user.edit.account');
    Route::get('user/remove/account/{id}', 'User\PaymentController@removeAccount')->name('user.remove.account');
    Route::post('user/update/account/{id}', 'User\PaymentController@updateAccount')->name('user.update.account');
    Route::post('user/store/account', 'User\PaymentController@storeAccount')->name('user.store.account');
    Route::get('user/deposit-funds', 'User\PaymentController@depositFunds')->name('user.deposit.funds');
    Route::post('user/store-funds', 'User\PaymentController@storeFunds')->name('user.store.funds');
    Route::get('user/learn-details/{id}', 'User\LearnController@learnDetails')->name('user.learn.details');
    Route::get('user/transactions', 'User\TransactionController@index')->name('user.transactions');
    Route::get('user/settings', 'User\SettingController@index')->name('user.settings');
    Route::get('user/settings/update', 'User\SettingController@update')->name('user.settings.update');
    Route::get('user/notifications', 'User\NotificationController@index')->name('user.notifications');
    Route::get('user/tasks', 'User\TasksController@index')->name('user.tasks');
    Route::get('user/projects', 'User\TasksController@projects')->name('user.projects');
    Route::get('user/refer', 'User\ReferController@index')->name('user.refer');
    Route::get('user/help', 'User\HelpController@index')->name('user.help');
    Route::get('user/tasks/take/{id}', 'User\TasksController@taskTake')->name('user.tasks.take');
    Route::get('user/tasks/extend/{id}', 'User\TasksController@extendTime')->name('user.tasks.extend');
    Route::get('user/tasks/work', 'User\TasksController@work')->name('user.tasks.work');
    Route::get('user/tests/writing-test', 'User\TestController@writingTest')->name('user.tests.writing.test');
    Route::post('user/tests/save-progress/{id}', 'User\TestController@saveProgress')->name('user.tests.save.progress');
    Route::get('user/tests/video-test', 'User\TestController@videoTest')->name('user.tests.video.test');
    Route::post('user/tasks/save-progress/{id}', 'User\TasksController@saveProgress')->name('user.tasks.save.progress');
    Route::get('user/tasks/create-doc/{id}', 'User\OfficeController@createDoc')->name('user.tasks.create.doc');
    Route::post('user/tasks/upload-doc/{id}', 'User\OfficeController@uploadDoc')->name('user.tasks.upload.doc');
    Route::post('user/profile/edit-personal', 'User\ProfileController@editPersonal')->name('user.profile.edit.personal');
    Route::post('user/profile/edit-password', 'User\ProfileController@editPassword')->name('user.profile.edit.password');
    Route::resource('withdraw', 'WithdrawController');
//    Route::resource('accounts', 'AccountController');

});

Route::get('/', 'Pages\PagesController@home')->name('pages.home')->middleware('user');
Route::get('/inactive', 'Pages\PagesController@inactive')->name('pages.inactive');
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

Route::get('send', 'HomeController@sendNotification');
Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');



