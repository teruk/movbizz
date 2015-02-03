<?php namespace MovBizz\Advertisement;

use Laracasts\Commander\CommandHandler;

class CheckInputCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	if ($command->tv == 0 && $command->radio == 0 && $command->poster == 0)
    		return true;

    	return false;
    }

}