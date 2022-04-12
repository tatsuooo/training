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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware' => 'auth' ], function() {
    Route::get('tra/calender', 'Admin\TraController@cal');
    Route::get('tra/katamenu', 'Admin\Tracontroller@kata');
    Route::get('tra/munemenu', 'Admin\TraController@mune');
    Route::get('tra/haramenu', 'Admin\TraController@hara');
    Route::get('tra/sirimenu', 'Admin\TraController@siri');
    Route::get('tra/ashimenu', 'Admin\TraController@ashi');
    Route::get('tra/create', 'Admin\TraController@add');
    Route::post('tra/create', 'Admin\TraController@create'); # 追記
    Route::get('tra', 'Admin\TraController@index');
    Route::get('tra/edit', 'Admin\TraController@edit');
    Route::post('tra/edit', 'Admin\TraController@update');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
