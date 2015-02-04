<?php namespace MovBizz\GameSession;

use Laracasts\Commander\CommandHandler;
use Session;

class SaveNumberOfPlayersCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	Session::put('numberOfPlayers', $command->numberOfPlayers);
    }

}