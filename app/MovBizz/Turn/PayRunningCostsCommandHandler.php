<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use Session;
use MovBizz\Movies\Movie;
use Event;

class PayRunningCostsCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	// look through the movie array which is in production
    	foreach (Session::get('player.movies') as $movie) {
    		if ($movie->getStatusAttribute() == 0)
    		{
    			$movie->setRunningCosts( floor($movie->getCostAttribute() * (rand(201, 299) / 10000) ) );

    			Session::set('player.money', Session::get('player.money') - $movie->runningCosts);
    			$movie->addCosts($movie->runningCosts);

    			if ($movie->getRoundAttribute() == 0) {
    				$movie->setStatusToInCharts();
                    $awardCandidates = Session::get('player.awardCandidates');
                    array_push($awardCandidates, $movie);
                    Session::set('player.awardCandidates', $awardCandidates);

                    Event::fire('stats.producedMovies');
                }
    		}
    	}
    }

}