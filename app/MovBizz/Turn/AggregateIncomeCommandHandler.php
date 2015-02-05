<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;

class AggregateIncomeCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$income = [];
    	foreach ($command->players as $player) {
    		$aggregatedIncome = 0;
    		foreach ($player->getMoviesAttribute() as $movie) {
    			if ($movie->hasStatusInCharts())
    				$aggregatedIncome += $movie->getRoundIncomeAttribute();
    		}

    		array_push($income, [
    			'player' => $player,
    			'income' => $aggregatedIncome
    			]);
    	}
    	return $income;
    }

}