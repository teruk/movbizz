<?php namespace MovBizz\Movies;

use Illuminate\Support\Facades\Session;
use MovBizz\Persons\ActorRepository;
use MovBizz\Persons\DirectorRepository;
use MovBizz\Persons\Actor;
use MovBizz\Persons\Director;
use MovBizz\Locations\LocationRepository;
use MovBizz\Locations\Location;
use MovBizz\Movies\Movie;
use Faker\Factory as Faker;

class MovieRepository {

	protected $actorRepo;
	protected $directorRepo;
	protected $locationRepo;

	function __construct(LocationRepository $locationRepo, ActorRepository $actorRepo, DirectorRepository $directorRepo)
	{
		$this->directorRepo = $directorRepo;
		$this->actorRepo = $actorRepo;
		$this->locationRepo = $locationRepo;
	}

	/**
	 * return all movies which are currently in production
	 * @return [type] [description]
	 */
	public function getInProductionMovies() 
	{
		$allMovies = Session::get('player.movies');
		$inProductionMovies = [];
		foreach ($allMovies as $movie) 
		{
			if ($movie->status == 0 || $movie->round == 1)
				array_push($inProductionMovies, $movie);
		}

		return $inProductionMovies;
	}

	/**
	 * return all movies which are currently in charts
	 * @return [type] [description]
	 */
	public function getInChartsMovies()
	{
		$allMovies = Session::get('player.movies');
		$inChartsMovies = [];
		foreach ($allMovies as $movie) 
		{
			if ($movie->status == 1)
				array_push($inChartsMovies, $movie);
		}

		return $inChartsMovies;	
	}

	/**
	 * calculate the border number
	 * @param  Movie  $movie        [description]
	 * @param  [type] $borderNumber [description]
	 * @return [type]               [description]
	 */
	private function calculateIncomeBorder(Movie $movie, $borderNumber)
	{
		$border = ( round($borderNumber * ($movie->quality / 100)) * $movie->popularity / 100) + ($borderNumber * $movie->quality / 100) - $movie->round;
		return $border;
	}

	/**
	 * find a movie by it's number of rounds
	 * @param  [type] $round [description]
	 * @return [type]        [description]
	 */
	public function findByRound($round)
	{
		$allMovies = Session::get('player.movies');
		$movie = null;
		foreach ($allMovies as $m) {
			if ($m->round == $round)
				$movie = $m;
		}

		return $m;
	}

	/**
	 * calculate the current income of a given movie
	 * @param  Movie  $movie [description]
	 * @return [type]        [description]
	 */
	private function calculateIncome(Movie $movie)
	{
		$minValue = 20;
		$maxValue = 25;

		$min = $this->calculateIncomeBorder($movie, $minValue);
		$max = $this->calculateIncomeBorder($movie, $maxValue);
		$income = floor($movie->costs * (mt_rand($min, $max)) / 100);

		return $income;
	}

	/**
	 * [calculateProgress description]
	 * @param  Movie  $movie [description]
	 * @return [type]        [description]
	 */
	public function calculateProgress(Movie $movie)
	{
		$income = $this->calculateIncome($movie);
		$movie->setRoundIncome($income);
    	$movie->increaseIncome();

    	return $movie;
	}

	/**
	 * return the movies, which aren't advertised yet in this round
	 * @return [type] [description]
	 */
	public function getNotAdvertisedMovies()
	{
		if (!array_key_exists('advertisedMovies', Session::get('advertisement')))
			return Session::get('player.movies');

		$allMovies = Session::get('player.movies');
		$notAdvertisedMovies = [];
		$advertisedMovies = Session::get('advertisement.advertisedMovies');
		foreach ($allMovies as $movie) {
			if (!in_array($movie, $advertisedMovies))
				array_push($notAdvertisedMovies, $movie);

		}
		return $notAdvertisedMovies;
	}

	/**
	 * generate a fake movie
	 * @return [type] [description]
	 */
	public function generateComputerMovie()
	{
		$actors = $this->actorRepo->getAll();
    	$directors = $this->directorRepo->getAll();
    	$locations = $this->locationRepo->getAll();

    	$faker = Faker::create();

    	$movie = new Movie();

		// generate title
		$data = array_add([], 'title', $faker->catchPhrase);


		// randomly select an actor and pull him out of the array
		$actor = $actors[mt_rand(0, (sizeof($actors)-1))];
		$data['actor']['id'] = $actor->id;

		$director = $directors[mt_rand(0, (sizeof($directors)-1))];
		$data['director']['id'] = $director->id;

		$location = $locations[mt_rand(0, (sizeof($locations)-1))];
		$data['location']['id'] = $location->id;

		// calculate quality of the movie
		$quality = $this->calculateQuality($data['actor']['id'], $data['director']['id'], $data['location']['id']);
		$data = array_add($data, 'quality', $quality);

		// calculate total cost
		$totalCost = ($actor->wage + $director->wage + $location->rent);
		$totalCost += floor($totalCost * (rand(201, 299) / 10000) ) * floor($data['quality'] / 20); // running costs
		$data = array_add($data, 'total_cost', $totalCost);

		$movie->setAttributes($data);
		$movie->setRoundCounter(1);
		$movie->setStatusToInCharts();

		if(!$this->calculateNewAssetsCosts($movie))
                Flash::error("Error: Couldn't save new asset costs!");

		return $movie;
	}

	/**
	 * calculate the quality of the given movie
	 * @param  Movie  $movie [description]
	 * @return [type]        [description]
	 */
	public function calculateQuality($actorId, $directorId, $locationId)
	{
		$actor = $this->actorRepo->findById($actorId);
    	$director = $this->directorRepo->findById($directorId);
    	$location = $this->locationRepo->findById($locationId);

		// calculate quality of the movie
		$quality = round((($actor->talent * 10 + rand(0,4) * $this->calculateTheSignOfANumber()) + 
					($director->talent * 10 + rand(0,4) * $this->calculateTheSignOfANumber()) + 
					($location->quality * 10 + rand(0,2) * $this->calculateTheSignOfANumber())) / 3);

		if ($quality > 100)
			$quality = 100;

		return $quality;
	}

	/**
	 * decides if the sign of number is positive or negative
	 * @return [type] [description]
	 */
	private function calculateTheSignOfANumber()
    {
    	return (mt_rand(0,1)*2-1);
    }

    /**
     * calculate new asset costs
     * @param  Movie  $movie [description]
     * @return [type]        [description]
     */
    public function calculateNewAssetsCosts(Movie $movie)
    {
    	// actor
    	$actor = $this->actorRepo->calculate(
    		$movie->actorId, 
    		$movie->getQualityAttribute()
    		);
    	if (!$actor->save())
    		return false;
    	
    	// director
    	$director = $this->directorRepo->calculate(
    		$movie->directorId, 
    		$movie->getQualityAttribute()
    		);
    	if (!$director->save())
    		return false;

    	// location
    	$location = $this->locationRepo->calculate(
    		$movie->locationId, 
    		$movie->getQualityAttribute()
    		);
    	if (!$location->save())
    		return false;

    	return true;
    }
}