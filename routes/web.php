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


Route::get('user/{id}','TestController@showid');

Route::get('/register','TestController@showForm');

Route::post('/user/register',array('uses'=>'TestController@postRegister'));

Route::get('user/register/show','TestController@showTable');

Route::get('user/register/edit/{id}','TestController@editTable');

Route::post('user/register/update','TestController@updTable');

Route::get('user/register/delete/{id}','TestController@deleteTable');

Route::resource('test','TestController');

Route::get('/resident/eloquent','TestController@eloquenttest');
