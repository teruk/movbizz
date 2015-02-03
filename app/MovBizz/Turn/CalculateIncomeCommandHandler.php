<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use Session;
use MovBizz\Movies\Movie;
use MovBizz\Movies\MovieRepository;

class CalculateIncomeCommandHandler implements CommandHandler {

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
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	foreach (Session::get('player.movies') as $movie) 
    	{

    		if ($movie->status == 1)
    		{
    			$movie = $this->movieRepo->calculateProgress($movie);

    			Session::set('player.money', (Session::get('player.money') + $movie->roundIncome));
    		}
    	}
    }

}