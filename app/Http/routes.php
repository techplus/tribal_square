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
//dd(app());
Route::controllers([
	'login' => 'Auth\AuthController',
	'auth'	=>	'Auth\AuthController',
	'register'	=>	'Auth\RegisterController',
	'password' => 'Auth\PasswordController',
    'payments'  => 'Users\PaymentsController'
]);
Route::resource('languages','LanguagesController');
Route::group( [ 'middleware' => [ 'auth.admin' ] ] , function() {
	Route::resource( 'category.sub-category' , 'Admin\SubCategoryController',['only'=>['index','store','update','destroy']] );
	Route::get('category/{name}/export','Admin\SubCategoryController@exportCategory');
	Route::post('cateogry/{name}/import','Admin\SubCategoryController@postImportCategory');
	Route::get('cat-type','Admin\SubCategoryController@getCatType');
	Route::resource('admin/deals','Admin\DealsController',['only'=>['index','update','destroy','show']]);
	Route::resource('admin/posts','Admin\PostsController',['only'=>['index','update','destroy','show']]);
	Route::resource('admin/babysitters','Admin\BabySittersController',['only'=>['index','update','destroy','show']]);
	Route::resource('admin/administrators','Admin\AdminsController');
});

Route::group(['middleware'=>['auth.providers','payment']],function(){
	Route::resource('providers','Users\ProvidersController',['only'=>['index','show','update']]);
	Route::resource('posts','Users\PostsController');
	Route::resource('posts.images','Users\ImagesController',['only'=>['store','update','destroy']]);
	Route::resource('posts.videos','Users\VideosController',['only'=>['store','update','destroy']]);
	Route::resource('deals','Users\DealsController');	
	Route::resource('deals.images','Users\ImagesController',['only'=>['store','update','destroy']]);
	Route::resource('deals.videos','Users\VideosController',['only'=>['store','update','destroy']]);	
	Route::controller('deals','Users\DealsController');	
	Route::get('set-success-session-deal',function(){		
		Session::put('success_deal','Your Deal details have been successfully posted to Admin. It will go live soon.');			
		return response()->json([]);
	});
});
Route::group(['middleware'=>['auth.babysitters','payment']],function(){
	//Route::resource('baby-sitters','Users\BabySittersController',['only'=>['index']]);
	Route::controller('baby-sitters','Users\BabySittersController');
});

Route::group(['middleware'=>['auth.salesagnet']],function(){
	Route::resource('sales-agents','Users\SalesAgentController',['only'=>['index','update']]);
});

Route::group( ['middleware' => ['guest'] ], function() {
	
	Route::resource('search','SearchController',['only'=>'store']);
	Route::resource('search/classified','ClassifiedsController');
	Route::resource('search/babysitters','BabySittersController',[ 'only' => [ 'index' , 'show' ] ]);
	//Route::get('search/babysitters/show/{user_id}','BabySittersController@show');
	Route::resource('search/deals','DealsController');
	Route::resource('search/categories','CategoriesController');
	Route::post('search/babysitters/paginated-baby-sitters','BabySittersController@postPaginatedBabySitters');
	Route::controller('shopping-cart','ShoppingCartsController');
	Route::controller('/','HomeController');
	//Route::get('/terms', 'HomeController@terms');
});


