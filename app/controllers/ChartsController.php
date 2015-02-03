<?php

class ChartsController extends \BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$charts = Session::get('charts');

		$charts = array_slice($charts['positions'], 0, 20);

		return View::make('charts.overview', compact('charts'));
	}
}
