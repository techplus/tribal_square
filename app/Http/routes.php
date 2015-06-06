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

Route::controllers([
	'login' => 'Auth\AuthController',
	'auth'	=>	'Auth\AuthController',
	'register'	=>	'Auth\RegisterController',
	'password' => 'Auth\PasswordController',
    'payments'  => 'Users\PaymentsController'
]);
Route::resource('languages','LanguagesController');
Route::group( [ 'middleware' => [ 'auth.admin'] ] , function() {

	Route::get('admin/sales-agents/show-earnings/{id}/{year?}','Admin\AgentEarningsController@getShowEarnings');
	Route::get('admin/sales-agents/show-earnings-monthly/{id}/{year?}/{month?}','Admin\AgentEarningsController@getShowEarningsMonthly');
	Route::get('admin/sales-agents/update-earning/{id}/{year?}/{month?}','Admin\AgentEarningsController@getUpdateEarning');
	Route::resource( 'category.sub-category' , 'Admin\SubCategoryController',['only'=>['index','store','update','destroy']] );
	Route::get('category/{name}/export','Admin\SubCategoryController@exportCategory');
	Route::post('cateogry/{name}/import','Admin\SubCategoryController@postImportCategory');
	Route::get('cat-type','Admin\SubCategoryController@getCatType');
	Route::resource('admin/deals','Admin\DealsController',['only'=>['index','update','destroy','show']]);
	Route::resource('admin/posts','Admin\PostsController',['only'=>['index','update','destroy','show']]);
	Route::resource('admin/babysitters','Admin\BabySittersController',['only'=>['index','update','destroy','show','edit','create']]);
	Route::resource('admin/administrators','Admin\AdminsController');

	Route::resource('admin/home-slider','Admin\HomesliderController',['only'=>['index','update','store']] );

	Route::resource('admin/settings','Admin\SettingController',['only'=>['index','update']] );
	Route::resource('admin/sales-agents','Admin\AgentEarningsController');
	Route::resource('admin/privacy-policy','Admin\PrivacypolicyController',['only'=>['index','update']] );
	Route::resource('admin/terms','Admin\TermsController',['only'=>['index','update']] );
	Route::resource('admin/refund-policy','Admin\RefundpolicyController',['only'=>['index','update']] );
	Route::resource('admin/contact-us','Admin\ContactUsController',['only'=>['index','store']] );
	Route::resource('admin/providers','Admin\ProvidersController',['only'=>['index','edit','destroy']]);

	Route::controller('baby-sitters','Users\BabySittersController');
	Route::resource('baby-sitter/billings','Users\BillingsController');
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
	Route::resource('provider/billings','Users\BillingsController');
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
	Route::resource('provider/billings','Users\BillingsController');
});


Route::group(['middleware'=>['auth.babysitters','payment']],function(){
	Route::controller('baby-sitters','Users\BabySittersController');
	Route::resource('baby-sitter/billings','Users\BillingsController');
});

Route::group(['middleware'=>['auth.salesagnet']],function(){
	Route::resource('sales-agents','Users\SalesAgentController',['only'=>['index','update']]);
	Route::controller('sales-agents','Users\SalesAgentController');
});

Route::resource('search','SearchController',['only'=>'store']);
Route::resource('search/classified','ClassifiedsController');
Route::resource('search/babysitters','BabySittersController',[ 'only' => [ 'index' , 'show' ] ]);
Route::resource('search/deals','DealsController');
Route::resource('search/categories','CategoriesController');
Route::post('search/babysitters/paginated-baby-sitters','BabySittersController@postPaginatedBabySitters');
Route::controller('shopping-cart','ShoppingCartsController');
Route::controller('/','HomeController');

// Route::group( ['middleware' => ['guest'] ], function() {});
	




