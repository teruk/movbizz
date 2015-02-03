<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use Session;

class IncreaseRoundCounterCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	Session::set('game.round', (Session::get('game.round') + 1));
    }

}