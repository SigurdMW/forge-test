<?php

Route::group(['middleware' => ['api']], function () {
	
	// Users
	Route::resource('users','UserController');

	// Articles
	Route::resource('articles','ArticleController');

	// Users articles
	Route::get('users/{id}/articles','UserController@usersArticles');
});
