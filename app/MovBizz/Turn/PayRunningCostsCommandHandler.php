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
        foreach ($command->players as $player) {
        	// look through the movie array which is in production
        	foreach ($player->getMoviesAttribute() as $movie) {
                
        		if ($movie->hasStatusInProduction()) {
//        			$movie->setRunningCosts( floor($movie->getCostAttribute() * (rand(201, 299) / 10000) ) );
                    $movie->setRunningCosts( mt_rand( 12000, ( round( ($movie->getQualityAttribute() +  10 ) / 20) * 6000 + 12000) ) );

                    $player->payMoney($movie->getRunningCosts);
        			$movie->addCosts($movie->runningCosts);

        			if ($movie->getRoundAttribute() == 0) {
        				$movie->setStatusToInCharts();
                        $player->addAwardCandidate($movie);

                        Event::fire('stats.producedMovies');
                    }
        		}
        	}
        }
    }

}