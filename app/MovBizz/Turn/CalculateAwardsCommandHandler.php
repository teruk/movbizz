<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use Session;

class CalculateAwardsCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$awardCandidates = Session::get('player.awardCandidates');
    	$winners = [];

    	foreach ($awardCandidates as $candidate) {
    		if ($candidate->getQualityAttribute() > 90) {
    			array_push($winners, $candidate);
    			Session::set('player.money', (Session::get('player.money') + 1000000));
    			$candidate->income += 1000000;

    			// popularity boost
    			if ($candidate->getStatusAttribute() == 0)
    				$candidate->increasePopularity(25);
    		}
    	}

    	Session::set('player.awardCandidates', []);
    	Session::set('awards.winners', $winners);
    }

}