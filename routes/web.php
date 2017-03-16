<?php
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index');

Route::get("profile/show/{user_id}",'ProfileController@show');
Route::get("profile/edit",'ProfileController@edit');

//Route::get("login",'LoginController@showLoginForms');

Route::get("/register",function(){

  return view('pages.register');

});

Auth::routes();

//Route::get('/home', 'HomeController@index');
// test
