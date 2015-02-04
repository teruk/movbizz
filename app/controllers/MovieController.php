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
		$movies = Session::get('game.currentPlayer')->getMoviesAttribute();
		if (sizeof($movies) > 0) {

			foreach ($movies as $movie) {
				if (!$movie->hasStatusInProduction())
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
		$movies = Session::get('game.currentPlayer')->getMoviesAttribute();
		return View::make('movies.finance', compact('movies'));
	}
}
