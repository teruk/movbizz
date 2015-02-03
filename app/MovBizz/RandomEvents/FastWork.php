<?php namespace MovBizz\RandomEvents;

use MovBizz\Interfaces\RandomEventsInterface;
use MovBizz\Movies\MovieRepository;
use Session;

/**
* 
*/
class FastWork implements RandomEventsInterface
{
	protected $movieRepo;

	function __construct(MovieRepository $movieRepo) {
		$this->movieRepo = $movieRepo;
	}
	
	/**
	 * execute the random event
	 * @return [type] [description]
	 */
	public function run()
	{
		$movies = $this->movieRepo->getInProductionMovies();
		$numberOfMovies = sizeof($movies);
		if ($numberOfMovies > 0)
		{
			$selectedMovie = $movies[mt_rand(0, ($numberOfMovies-1))];

			if ($selectedMovie->getRoundAttribute() <= -2) {
				$selectedMovie->increaseRounds();

				return "The production of "$selectedMovie->getTitleAttribute() ." is going well. It will take less time than anticipated to finisch this movie.";
			}

		}
		return "Nothing special happened this round.";
	}
}