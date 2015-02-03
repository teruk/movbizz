<?php

/**
 * Protecting from csrf
 */

Route::when('*', 'csrf', ['post','put','patch']);

/**
 * Pulling in partial route files from the routes directory
 */

foreach (File::allFiles(__DIR__.'/routes') as $partial)
{
	require $partial->getPathname(); // for test purposes just require, in the live environment you should use require_once
}

// Home routes
Route::get('/', [
	'as' => 'index_path',
	'uses' => 'PagesController@home'
	]);