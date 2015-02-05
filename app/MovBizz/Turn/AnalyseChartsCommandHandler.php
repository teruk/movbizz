<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use MovBizz\Players\PlayerRepository;
use Session;

class AnalyseChartsCommandHandler implements CommandHandler {

	protected $playerRepo;

	function __construct(PlayerRepository $playerRepo) {
		$this->playerRepo = $playerRepo;
	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$charts = Session::get('charts');
    	$firstPosition = $charts['positions'][0];

    	// if first position in the charts belongs to a player, award him with a point
    	if ($firstPosition->belongsToPlayer)
    		$this->playerRepo->verifyPoints($firstPosition->getPlayerAttribute(), 1);
    }

}