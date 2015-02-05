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
        foreach ($command->players as $player) {
            
        	foreach ($player->getMoviesAttribute() as $movie) {

        		if ($movie->hasStatusInCharts()) {
        			$this->movieRepo->calculateProgress($movie);
                    $player->addMoney($movie->roundIncome);
        		}
        	}
        }
    }

}