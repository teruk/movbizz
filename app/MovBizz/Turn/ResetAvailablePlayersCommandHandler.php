<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use Session;

class ResetAvailablePlayersCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	Session::set('game.availablePlayers', Session::get('game.players'));
    }

}