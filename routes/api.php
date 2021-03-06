<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Apis\PassportController@login');
Route::post('register', 'Apis\PassportController@register');

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'Apis\PassportController@details');

    Route::get('tasks', 'Apis\TaskController@tasks');

    Route::resource('products', 'ProductController');
});
