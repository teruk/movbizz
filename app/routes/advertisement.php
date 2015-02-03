<?php

Route::get('advertisement', [
	'as' => 'advertisement_path',
	'uses' => 'AdvertisementController@showMovies'
	]);

Route::post('selectAdvertisement', [
	'as' => 'selectAdvertisement_path',
	'uses' => 'AdvertisementController@selectAdvertisement'
	]);

Route::post('advertisement', [
	'as' => 'placeAdvertisement_path',
	'uses' => 'AdvertisementController@advertise'
	]);