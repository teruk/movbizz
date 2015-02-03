<?php

class ChangelogController extends \BaseController 
{
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		return View::make('pages.changelog');
	}

}
