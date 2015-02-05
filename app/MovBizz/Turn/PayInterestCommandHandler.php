<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use Session;

class PayInterestCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        foreach ($command->players as $player) {
            $interest = floor( $player->getLoanAttribute() * Session::get('game.creditRate') / 100);
            $player->payMoney($interest);
        }
    }

}