<?php

Route::get('turnSummary', [
	'as' => 'showTurnSummary_path',
	'uses' => 'TurnController@showSummary'
	]);

Route::post('turnSummary', [
	'as' => 'turnSummary_path',
	'uses' => 'TurnController@endTurn'
	]);

Route::post('nextPlayer', [
	'as' => 'nextPlayer_path',
	'uses' => 'TurnController@selectNextPlayer'
	]);