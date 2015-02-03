<?php namespace MovBizz\Advertisement;

use Laracasts\Commander\CommandHandler;
use Session;
use MovBizz\Movies\Movie;
use MovBizz\Movies\MovieRepository;

class StoreMovieCommandHandler implements CommandHandler {

	protected $movieRepo;

	function __construct(MovieRepository $movieRepo)
	{
		$this->movieRepo = $movieRepo;
	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$movie = $this->movieRepo->findByRound($command->round);
    	Session::set('advertisement.movie', $movie);

    	return $movie;
    }

}