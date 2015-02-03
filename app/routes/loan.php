<?php

/* take loan */
Route::get('takeLoan', [
	'as' => 'loan_path',
	'uses' => 'LoanController@getLoanForm'
	]);

Route::post('takeLoan', [
	'as' => 'takeLoan_path',
	'uses' => 'LoanController@takeLoan'
	]);

/* pay back loan */
Route::get('paybackLoan', [
	'as' => 'payback_path',
	'uses' => 'LoanController@getPaybackForm'
	]);

Route::post('paybackLoan', [
	'as' => 'paybackLoan_path',
	'uses' => 'LoanController@paybackLoan'
	]);