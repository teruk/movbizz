<?php namespace MovBizz\Statistics;

/**
* 
*/
class Stats
{
	protected $statisticRepo;

	function __construct(StatisticRepository $statisticRepo)
	{
		$this->statisticRepo = $statisticRepo;
	}

	/**
	 * increase statistic of started games
	 * @return [type] [description]
	 */
	public function increaseStartedGames()
	{
		$statistic = $this->statisticRepo->increaseCount('numberOfGames');
	}

	/**
	 * increase statistic produced movies
	 * @return [type] [description]
	 */
	public function increaseProducedMovies()
	{
		$statistic = $this->statisticRepo->increaseCount('numberOfProducedMovies');
	}

	/**
	 * increase total lottery winnings
	 * @param  [type] $winnings [description]
	 * @return [type]           [description]
	 */
	public function increaseLotteryWinnings($winnings)
	{
		$statistic = $this->statisticRepo->findByName('lotteryWinnings');
		$statistic->setValueAttribute( $statistic->getValueAttribute() + $winnings);
		$statistic->save();
	}

	/**
	 * increase statistic drug use
	 * @return [type] [description]
	 */
	public function increaseDrugUse()
	{
		$statistic = $this->statisticRepo->increaseCount('numberOfDrugsUsed');
	}
}