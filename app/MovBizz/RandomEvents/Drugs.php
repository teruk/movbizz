<?php namespace MovBizz\RandomEvents;

use MovBizz\Interfaces\RandomEventsInterface;
use MovBizz\Movies\MovieRepository;
use MovBizz\Persons\ActorRepository;
use Session;
use Event;

/**
* 
*/
class Drugs implements RandomEventsInterface
{
	protected $movieRepo;
	protected $actorRepo;

	function __construct(MovieRepository $movieRepo, ActorRepository $actorRepo) {
		$this->movieRepo = $movieRepo;
		$this->actorRepo = $actorRepo;
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

			if ($selectedMovie->getStatusAttribute() == 0) {
				$selectedMovie->decreaseRounds();

				$actor = $this->actorRepo->findById($selectedMovie->getActorIdAttribute());

				Event::fire('stats.drugUse');
				return $actor->present()->name." had a drug incident. The Production of ".$selectedMovie->getTitleAttribute() ." is delayed.";
			}

		}
		return "Nothing special happened this round.";
	}
}