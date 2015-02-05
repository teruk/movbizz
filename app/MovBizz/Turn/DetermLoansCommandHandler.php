<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;

class DetermLoansCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$loans = 0;

    	foreach ($command->players as $player) {
    		$loans += $player->getLoanAttribute();
    	}

    	if ($loans > 0) 
    		return true;

    	return false;
    }

}