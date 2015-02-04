<?php namespace MovBizz\Production;

use Laracasts\Commander\CommandHandler;
use Session;
use MovBizz\Movies\Movie;

class StartProductionCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $production = Session::get('production');

        $currentPlayer = Session::get('game.currentPlayer');

        // player pays money for production
        $currentPlayer->payMoney( ($production['actor']['wage'] + $production['director']['wage'] + $production['location']['rent']) );

        // create movie
        $movie = new Movie();
        $movie->setAttributes($production);

        // add movie to player movies
        $currentPlayer->addMovie($movie);

    	Session::forget('production');
        
        return $movie;
    }

}