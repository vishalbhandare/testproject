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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'User\HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('/message/compose', 'User\MessageController@showForm');
Route::post('/message/send', 'User\MessageController@save');
Route::get('/message/list', 'User\MessageController@view');


Route::resource('users', 'Admin\UserController');
Route::resource('roles', 'Admin\RoleController');
Route::resource('permissions', 'Admin\PermissionController');
Route::resource('dictionary', 'Admin\DictionaryController');

