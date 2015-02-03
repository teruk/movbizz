<?php

/** title */
Route::get('selectTitle', [
	'as' => 'selectMovieTitle_path',
	'uses' => 'ProductionController@selectTitle'
	]);

Route::post('selectTitle', [
	'as' => 'storeMovieTitle_path',
	'uses' => 'ProductionController@storeTitle'
	]);

/** actor */
Route::get('selectActor', [
	'as' => 'selectActor_path',
	'uses' => 'ProductionController@selectActor'
	]);

Route::post('selectActor', [
	'as' => 'storeActor_path',
	'uses' => 'ProductionController@storeActor'
	]);

/** director */
Route::get('selectDirector', [
	'as' => 'selectDirector_path',
	'uses' => 'ProductionController@selectDirector'
	]);

Route::post('selectDirector', [
	'as' => 'storeDirector_path',
	'uses' => 'ProductionController@storeDirector'
	]);

/** location */
Route::get('selectLocation', [
	'as' => 'selectLocation_path',
	'uses' => 'ProductionController@selectLocation'
	]);

Route::post('selectLocation', [
	'as' => 'storeLocation_path',
	'uses' => 'ProductionController@storeLocation'
	]);

/** summary */
Route::get('selectionSummary', [
	'as' => 'selectionSummary_path',
	'uses' => 'ProductionController@getSummary'
	]);

/** production start */
Route::post('startProduction', [
	'as' => 'startProduction_path',
	'uses' => 'ProductionController@startProduction'
	]);