<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function(Request $request){
	return $request->user();
});

Route::group([
	'prefix' => '/users',
], function(){
	Route::get('/', 'UsersController@index')->name('lists');
	Route::get('builds', 'UsersController@builds')->name('builds');
	Route::get('{id}', 'UsersController@show')->name('profile');
});
