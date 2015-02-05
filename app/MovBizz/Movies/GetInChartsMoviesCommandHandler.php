<?php namespace MovBizz\Movies;

use Laracasts\Commander\CommandHandler;

class GetInChartsMoviesCommandHandler implements CommandHandler {

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
    	$moviesInCharts = [];

    	foreach ($command->players as $player) {
    		foreach ($this->movieRepo->getInChartsMovies($player) as $movie) {
    			array_push($moviesInCharts, [
    				'movie' => $movie,
    				'backgroundColor' => $player->getBgColorAttribute()
    				]);
    		}
    	}

    	return $moviesInCharts;
    }

}