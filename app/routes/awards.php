<?php

Route::get('awards', [
	'as' => 'showAwards_path',
	'uses' => 'AwardsController@show'
	]);