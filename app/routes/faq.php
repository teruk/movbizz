<?php

Route::get('faq', [
	'as' => 'faq_path',
	'uses' => 'PagesController@showFAQ'
	]);