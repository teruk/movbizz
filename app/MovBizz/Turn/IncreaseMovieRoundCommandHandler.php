<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use Session;
use MovBizz\Movies\Movie;

class IncreaseMovieRoundCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        foreach ($command->players as $player) {
            // increase the round count of player movies
        	foreach ($player->getMoviesAttribute() as $movie) 
        	{
        		$movie->increaseRounds();
        	}
        }

        // increase the round count of non-human movies in charts
        $charts = Session::get('charts');
        foreach ($charts['positions'] as $chartElement) {
            if (!$chartElement->belongsToPlayer)
                $chartElement->movie->increaseRounds();
        }
    }

}