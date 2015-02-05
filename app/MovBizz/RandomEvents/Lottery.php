<?php namespace MovBizz\RandomEvents;

use Session;
use MovBizz\Interfaces\RandomEventsInterface;
use Event;

/**
* Random event lottery
*/
class Lottery implements RandomEventsInterface
{
	/**
	 * execute the random event
	 * @return [type] [description]
	 */
	public function run($player)
	{
		$winnings = 0;

		for ($x = 0; $x < 10; ++$x) {
			if (mt_rand(1, 10) > 5)
				$winnings += mt_rand(10000, 100000);
		}

		$player->addMoney($winnings);

		Event::fire('stats.lotteryWinnings', [$winnings]);
		$player->setEventAttribute($player->getNameAttribute().' won '.$winnings.'€ in the lottery. Congratulations!');
	}
}