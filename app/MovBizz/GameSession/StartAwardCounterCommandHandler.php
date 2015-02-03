<?php namespace MovBizz\GameSession;

use Laracasts\Commander\CommandHandler;
use Session;

class StartAwardCounterCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	Session::put('awards.rounds', mt_rand(0, 11));
    	Session::put('awards.on', false);
    	Session::put('awards.winners', []);
    }

}