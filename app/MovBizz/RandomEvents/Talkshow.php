<?php namespace MovBizz\RandomEvents;

use Session;
use MovBizz\Interfaces\RandomEventsInterface;
use MovBizz\Movies\MovieRepository;
use MovBizz\Persons\ActorRepository;

/**
* Random event talkshow
*/
class Talkshow implements RandomEventsInterface
{
	
	protected $movieRepo;
	protected $actorRepo;

	function __construct(MovieRepository $movieRepo, ActorRepository $actorRepo) {
		$this->movieRepo = $movieRepo;
		$this->actorRepo = $actorRepo;
	}

	/**
	 * execute random event
	 * @return [type] [description]
	 */
	public function run($player)
	{
		$movies = $this->movieRepo->getInProductionMovies($player);
		$numberOfMovies = sizeof($movies);
		if ($numberOfMovies > 0)
		{
			$selectedMovie = $movies[mt_rand(0, ($numberOfMovies-1))];

			if ($selectedMovie->getStatusAttribute() == 0) {
				$selectedMovie->increasePopularity( 25 );

				$actor = $this->actorRepo->findById($selectedMovie->getActorIdAttribute());

				$player->setEvent($actor->present()->name."'s appearance on a well-know talkshow increased the popularity of ".$selectedMovie->getTitleAttribute() .".");
			}

		}
		$player->setEvent("Nothing special happened this round.");
	}
}