<?php namespace MovBizz\Production;

use Laracasts\Commander\CommandHandler;
use Session;

class StoreTitleCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	Session::put('production.title', $command->movieTitle);
    	
    	if (!Session::has('production.total_cost'))
    		Session::put('production.total_cost', 0);
    }

}