<?php namespace MovBizz\Handlers;

/**
* 
*/
class StatisticEvents
{
	
	/**
	 * listens for random events
	 * @param  [type] $event [description]
	 * @return [type]        [description]
	 */
	public function subscribe($event)
	{
		$event->listen('stats.startedGame', 'MovBizz\Statistics\Stats@increaseStartedGames');
		$event->listen('stats.producedMovies', 'MovBizz\Statistics\Stats@increaseProducedMovies');
		$event->listen('stats.lotteryWinnings', 'MovBizz\Statistics\Stats@increaseLotteryWinnings');
		$event->listen('stats.drugUse', 'MovBizz\Statistics\Stats@increaseDrugUse');
		// money spent
		// money spent on ads
		// award winnings
		// money income
		// highest lottery win
		// highest income
		// highest costs
	}
}