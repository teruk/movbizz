<?php namespace MovBizz\Statistics;

use Laracasts\Commander\CommandHandler;
use MovBizz\Statistics\Statistic;
use MovBizz\Statistics\StatisticRepository;

class CountGameStartsCommandHandler implements CommandHandler {

	protected $statisticRepo;

	function __construct(StatisticRepository $statisticRepo) {
		$this->statisticRepo = $statisticRepo;
	}
    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$statistic = $this->statisticRepo->findByName('numberOfGames');
    	$statistic->setValueAttribute($statistic->value + 1);
    	$statistic->save();
    }

}