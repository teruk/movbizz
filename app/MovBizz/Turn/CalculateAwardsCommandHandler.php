<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use MovBizz\Players\PlayerRepository;
use Session;

class CalculateAwardsCommandHandler implements CommandHandler {

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
    	$winners = [];
        $prizeMoney = 1000000;

        foreach ($command->players as $player) {
            
            foreach ($player->getAwardCandidatesAttribute() as $candidate) {
                if ($candidate->getQualityAttribute() > 90) {
                    array_push($winners, ['movie' => $candidate, 'player' => $player]);
                    $player->addMoney($prizeMoney);
                    $candidate->increaseIncome($prizeMoney);

                    // if the movie has the status is in charts, then the popularity will be increased
                    if (!$candidate->hasStatusInArchive()) 
                        $candidate->increasePopularity(25);

                    // the player will be awarded with points, if his loan is 0
                    $this->playerRepo->verifyPoints($player, 3);
                }
            }

            $player->resetAwardCandidates();
        }

    	Session::set('awards.winners', $winners);
    }

}