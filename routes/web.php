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

Route::get("profile/{user_id}",'ProfileController@show');

/*
  SETTINGS
 */

  Route::get('settings/profile','ProfileController@edit');
  Route::post('settings/profile','ProfileController@update');

/*
  FRIENDS
 */
Route::get('/friends','FriendsController@show');
Route::get('/friends/group/{group}','FriendsController@getFriendsRows');
Route::get('/friends/find','FriendsController@getFriendsRows');



Auth::routes();
