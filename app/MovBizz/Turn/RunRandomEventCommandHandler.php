<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use MovBizz\RandomEvents\RandomEventRepository;
use Event;
use Session;

class RunRandomEventCommandHandler implements CommandHandler {

	protected $randomEventRepo;

	function __construct(RandomEventRepository $randomEventRepo) {
		$this->randomEventRepo = $randomEventRepo;
	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	if (mt_rand(1, 25) == 1) {
	    	$eventMessage = Event::fire($this->randomEventRepo->getRandomEvent());
	   		Session::put('events', $eventMessage);
	   	} else {
	   		Session::put('events', ['Nothing special happened this round.']);
	   	}
    }

}