<?php namespace MovBizz\Loan;

use Laracasts\Commander\CommandHandler;
use Session;

class PayBackLoanCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $currentPlayer = Session::get('game.currentPlayer');
    	// add amount to loan
        $currentPlayer->payBackLoan($command->amount);

        return $currentPlayer->getLoanAttribute();
    }

}