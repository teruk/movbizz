<?php namespace MovBizz\Loan;

use Laracasts\Commander\CommandHandler;
use Session;

class TakeLoanCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	// add amount to loan
    	Session::set('player.loan', ( Session::get('player.loan') + $command->amount ));
    	// and amount to money
    	Session::set('player.money', ( Session::get('player.money') + $command->amount));
    }

}