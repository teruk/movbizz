<?php

Route::get('changelog', [
	'as' => 'changelog_path',
	'uses' => 'ChangelogController@show'
	]);