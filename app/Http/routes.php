<?php

Route::group(['middleware' => ['api'], 'prefix' => 'api/v1'], function () {
	
	// JWT Authentication
	Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user','AuthenticateController@getAuthenticatedUser');

	// Users
	Route::resource('users','UserController');

	// Articles
	Route::resource('articles','ArticleController');

	// Users articles
	Route::get('users/{id}/articles','UserController@usersArticles');
});
