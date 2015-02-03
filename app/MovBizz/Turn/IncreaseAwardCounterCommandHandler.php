<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use Session;

class IncreaseAwardCounterCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$roundCounter = Session::get('awards.rounds');

    	if ((++$roundCounter) == 12) {
    		$roundCounter = 0;
    		Session::set('awards.on', true);
    	}
    	
    	Session::set('awards.rounds', $roundCounter);
    }

}