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




/*
  PROFILE
 */

//display user profile
Route::get("profile/{user_id}",'ProfileController@show');

/*
  SETTINGS
 */

//display user edit profile form.
Route::get('settings/profile','ProfileController@edit');
Route::post('settings/profile','ProfileController@update');


Route::get("login",'LoginController@showLoginForms');

Route::get("/register",function(){

  return view('pages.register');

});

Auth::routes();

//Route::get('/home', 'HomeController@index');
// test
