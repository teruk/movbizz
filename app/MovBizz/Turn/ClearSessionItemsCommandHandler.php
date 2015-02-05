<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use Session;

class ClearSessionItemsCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	/* Advertisement section */
    	
    	// forget advertised movies
    	$advertisedMovies = Session::pull('advertisement.advertisedMovies');

    	// reset advertisement prices
    	Session::set('advertisement.tv', 0);
    	Session::set('advertisement.radio', 0);
    	Session::set('advertisement.poster', 0);
    }

}