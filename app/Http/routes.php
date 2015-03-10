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
//

Route::controllers([
	'login' => 'Auth\AuthController',
	'register'	=>	'Auth\RegisterController',
	'password' => 'Auth\PasswordController',
]);
Route::group( [ 'middleware' => [ 'auth.admin' ] ] , function() {
	Route::resource( 'category.sub-category' , 'Admin\SubCategoryController' );
	Route::get('cat-type','Admin\SubCategoryController@getCatType');
});

Route::group(['middleware'=>['auth.providers','payment']],function(){
	Route::resource('providers','Users\ProvidersController',['only'=>['index']]);
});

Route::group(['middleware'=>['auth.babysitters','payment']],function(){
	Route::resource('baby-sitters','Users\BabySittersController',['only'=>['index']]);
});

Route::group(['middleware'=>['auth.salesagnet','payment']],function(){
	Route::resource('sales-agents','Users\SalesAgentController',['only'=>['index']]);
});

Route::group( ['middleware' => ['guest'] ], function() {
	Route::controller('/','HomeController');
});