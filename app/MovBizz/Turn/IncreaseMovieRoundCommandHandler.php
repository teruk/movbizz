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
        // increase the round count of player movies
    	foreach (Session::get('player.movies') as $movie) 
    	{
    		$movie->increaseRounds();
    	}

        // increase the round count of non-human movies in charts
        $charts = Session::get('charts');
        foreach ($charts['positions'] as $chartElement) {
            $chartElement->movie->increaseRounds();
        }
    }

}