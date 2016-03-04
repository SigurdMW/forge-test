<?php

Route::group(['middleware' => ['web']], function(){
	Route::get('/', 'PagesController@app');
	
	Route::auth();
    Route::get('/home', 'HomeController@index');

    Route::get('register/confirm/{token}','TokenController@confirm');
});

Route::group(['middleware' => ['api'], 'prefix' => 'api/v1'], function () {
	
	// JWT Authentication
	Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user','AuthenticateController@getAuthenticatedUser');

	// Users
	Route::resource('users','UserController');

	// Reset password
	Route::post('resetpassword', 'ResetPasswordController@reset');

	// Articles
	Route::resource('articles','ArticleController');

	// Users articles
	Route::get('users/{id}/articles','UserController@usersArticles');
});