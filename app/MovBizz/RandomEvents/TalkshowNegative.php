<?php namespace MovBizz\RandomEvents;

use Session;
use MovBizz\Interfaces\RandomEventsInterface;
use MovBizz\Movies\MovieRepository;
use MovBizz\Persons\DirectorRepository;

/**
* Random event talkshow
*/
class TalkshowNegative implements RandomEventsInterface
{
	
	protected $movieRepo;
	protected $directorRepo;

	function __construct(MovieRepository $movieRepo, DirectorRepository $directorRepo) {
		$this->movieRepo = $movieRepo;
		$this->directorRepo = $directorRepo;
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
				$selectedMovie->decreasePopularity( 15 );

				$actor = $this->directorRepo->findById($selectedMovie->getDirectorIdAttribute());

				$player->setEventAttribute($actor->present()->name." was criticised for the upcoming movie ".$selectedMovie->getTitleAttribute() .".");
			}

		}
		$player->setEventAttribute("Nothing special happened this round.");
	}
}