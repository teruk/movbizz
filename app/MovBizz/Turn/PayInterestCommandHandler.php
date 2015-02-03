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
		$interest = floor( Session::get('player.loan') * Session::get('game.credit_rate') / 100);
		Session::put('loan.interest', $interest);

		Session::set('player.money', Session::get('player.money') - $interest);
    }

}