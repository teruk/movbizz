<?php

Route::get('menu', [
	'as' => 'menu_path',
	'uses' => 'GameController@getMenu'
	])->before('gamesession');

/* start new game */
Route::get('startNewGame', [
	'as' => 'startNewGame_path',
	'uses' => 'GameController@getStartForm'
	]);

Route::post('startNewGame', [
	'as' => 'startGame_path',
	'uses' => 'GameController@startGame'
	]);

/* rest a game */
Route::get('restartGame', [
	'as' => 'restart_path',
	'uses' => 'GameController@getRestartForm'
	]);

Route::post('restartGame', [
	'as' => 'restart_path',
	'uses' => 'GameController@restartGame'
	]);