<?php

use MovBizz\Movies\MovieRepository;
use MovBizz\Advertisement\CalculateAdvertisementPricesCommand;
use MovBizz\Advertisement\StoreMovieCommand;
use MovBizz\Advertisement\AdvertiseMovieCommand;
use MovBizz\Advertisement\CheckInputCommand;

class AdvertisementController extends \BaseController {

	protected $movieRepo;

	/**
	 * [__construct description]
	 * @param MovieRepository $movieRepo [description]
	 */
	function __construct(MovieRepository $movieRepo)
	{
		$this->movieRepo = $movieRepo;
	}

	/**
	 * show movies to select for advertisement
	 * @return [type] [description]
	 */
	public function showMovies()
	{
		$movies = $this->movieRepo->getNotAdvertisedMovies();

		return View::make('advertisement.movies', compact('movies'));
	}

	/**
	 * store the selected movie and calculate the advertisement prices if nessesary
	 * @return [type] [description]
	 */
	public function selectAdvertisement()
	{
		$input = Input::all();

		if (Session::get('advertisement.tv') == 0)
			$prices = $this->execute(CalculateAdvertisementPricesCommand::class);
		else
			$prices = Session::get('advertisement');

		$movie = $this->execute(StoreMovieCommand::class, $input);

		return View::make('advertisement.select', compact('movie', 'prices'));
	}

	/**
	 * [advertise description]
	 * @return [type] [description]
	 */
	public function advertise()
	{
		$input = Input::all();

		// if everey input is 0, then redirect back
		if ($this->execute(CheckInputCommand::class, $input)) {
			Flash::error("You didn't choose any advertisment!");
			return Redirect::route('advertisement_path');
		}

		// advertise movie
		if ($this->execute(AdvertiseMovieCommand::class, $input))
		{
			Flash::success('Advertising was successful!');	
			return Redirect::route('advertisement_path');
		}

		Flash::error("You don't have enough money!");
		return Redirect::route('advertisement_path');
	}
}
