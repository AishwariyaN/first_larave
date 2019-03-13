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

Auth::routes();

Route::group(['middleware' => ['auth','admin']], function()
{

Route::get('/registerform','TestController@showForm');



Route::get('user/register/edit/{id}','TestController@editTable');

Route::get('user/register/show','TestController@showTable');

Route::post('user/register/update','TestController@updTable');

Route::post('/user/register/delete','TestController@deleteTable');

Route::post('/user/register',array('uses'=>'TestController@postRegister'));

Route::get('user/{id}','TestController@showid');

//Route::get('user/redirect','SocialAuthFacebookController@redirect');

});



Route::get('email','TestController@emailtest');

Route::post('sendemail','TestController@sendemail');

Route::resource('test','TestController');

Route::get('/resident/eloquent','TestController@eloquenttest');

Route::get('/home', 'HomeController@index')->name('home');



Route::get('facebook', function () {
    return view('facebook');
});
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');

Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::prefix('/admin')->group( function ()
{
Route::get('/loginform','AdminLoginController@showLoginForm')->name('loginform');

Route::post('/loginformsubmit','AdminLoginController@submitLoginForm')->name('loginformsubmit');

Route::get('/','AdminController@index')->name('admindashboard');
});

