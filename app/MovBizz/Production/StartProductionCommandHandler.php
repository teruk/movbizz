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

        Session::set('player.money', ( 
            Session::get('player.money') - 
            $production['actor']['wage'] -
            $production['director']['wage'] -
            $production['location']['rent']
            ));

        $movie = new Movie();
        $movie->setAttributes($production);

        Session::push('player.movies', $movie);

    	Session::forget('production');
        
        return $movie;
    }

}