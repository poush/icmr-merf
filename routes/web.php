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

Route::get('/', 'HomeController@index')->name('home');

Route::get('about', 'HomeController@about')->name('about');
Route::get('help', 'HomeController@contact')->name('help');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::get('terms', 'HomeController@terms')->name('terms');
Route::get('privacy', 'HomeController@privacy')->name('privacy');

// Route::group(['prefix' => 'equipments', 'as' => 'equipments'], function () {
//     Route::get('/', 'EquipmentController@index');
// });

Route::resource('equipments', 'EquipmentController')->only([
    'index', 'show'
]);

Route::resource('institutes', 'EquipmentController')->only([
    'index', 'show'
]);

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => 'auth'
], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('users/create/{institute_id}/{type?}', 'UserController@create')
        ->name('users.create-admin');
    Route::resource('users', 'UserController');
    Route::resource('institutes', 'InstituteController');
    Route::resource('equipments', 'EquipmentController');
	Route::resource('institute-equipments', 'InstituteEquipmentController')->except('index', 'show');

    Route::resource('categories', 'CategoryController');

});
