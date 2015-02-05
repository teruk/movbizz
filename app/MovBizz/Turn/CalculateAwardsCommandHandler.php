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
    	$winners = [];
        $prizeMoney = 1000000;

        foreach ($command->players as $player) {
            
            foreach ($player->getAwardCandidatesAttribute() as $candidate) {
                if ($candidate->getQualityAttribute() > 90) {
                    array_push($winners, ['movie' => $candidate, 'backgroundColor' => $player->getBgColorAttribute()]);
                    $player->addMoney($prizeMoney);
                    $candidate->increaseIncome($prizeMoney);

                    if (!$candidate->hasStatusInArchive()) {
                        $candidate->increasePopularity(25);
                    }
                }
            }

            $player->resetAwardCandidates();
        }

    	Session::set('awards.winners', $winners);
    }

}