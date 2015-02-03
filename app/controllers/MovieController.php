<?php

class MovieController extends \BaseController {

	/**
	 * show overview of the movies - quality and round
	 * only which are not in production will be returned
	 * 
	 * @return [type] [description]
	 */
	public function showOverview()
	{
		$movies = [];
		if (sizeof(Session::get('player.movies')) > 0) 
		{
			foreach (Session::get('player.movies') as $movie) {
				if ($movie->status != 0)
					array_push($movies, $movie);
			}
		}
		return View::make('movies.overview', compact('movies'));
	}

	/**
	 * show overview of the movies - income and costs
	 * @return [type] [description]
	 */
	public function showIncomeCosts()
	{
		$movies = Session::get('player.movies');

		return View::make('movies.finance', compact('movies'));
	}
}
