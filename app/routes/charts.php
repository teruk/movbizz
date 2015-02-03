<?php

Route::get('charts', [
	'as' => 'charts_path',
	'uses' => 'ChartsController@show'
	]);