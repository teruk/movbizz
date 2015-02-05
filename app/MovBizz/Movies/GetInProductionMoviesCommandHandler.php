<?php namespace MovBizz\Movies;

use Laracasts\Commander\CommandHandler;

class GetInProductionMoviesCommandHandler implements CommandHandler {

	protected $movieRepo;

	function __construct(MovieRepository $movieRepo) {
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
    	$moviesInProduction = [];

    	foreach ($command->players as $player) {
    		foreach ($this->movieRepo->getInProductionMovies($player) as $movie) {
    			array_push($moviesInProduction, [
    				'movie' => $movie,
    				'backgroundColor' => $player->getBgColorAttribute()
    				]);
    		}
    	}

    	return $moviesInProduction;
    }

}