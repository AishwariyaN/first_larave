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


Route::get('age',[
   'uses' => 'TestController@index',
])->middleware('age');


Route::group(['middleware' => ['auth','admin']], function()
	{


Route::get('/registerform','TestController@showForm');

Route::get('user/{id}','TestController@showid');

Route::get('user/register/edit/{id}','TestController@editTable');

Route::post('user/register/update','TestController@updTable');

Route::get('user/register/delete/{id}','TestController@deleteTable');

Route::post('/user/register',array('uses'=>'TestController@postRegister'));


	});


Route::get('user/register/show','TestController@showTable')->middleware('auth');




Route::resource('test','TestController');

Route::get('/resident/eloquent','TestController@eloquenttest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
