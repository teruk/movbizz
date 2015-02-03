<?php

Route::get('showMovies', [
	'as' => 'showMovies_path',
	'uses' => 'MovieController@showOverview'
	]);

Route::get('showIncomeCosts', [
	'as' => 'showIncomeCosts_path',
	'uses' => 'MovieController@showIncomeCosts'
	]);