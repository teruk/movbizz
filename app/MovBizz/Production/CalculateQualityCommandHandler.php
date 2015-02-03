<?php namespace MovBizz\Production;

use Laracasts\Commander\CommandHandler;
use Session;
use MovBizz\Movies\MovieRepository;

class CalculateQualityCommandHandler implements CommandHandler {

	protected $movieRepo;
	protected $locationRepo;

	function __construct(MovieRepository $movieRepo)
	{
		$this->movieRepo = $movieRepo;
	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $quality = $this->movieRepo->calculateQuality(
            Session::get('production.actor.id'), 
            Session::get('production.director.id'), 
            Session::get('production.location.id')
            );

    	Session::put('production.quality', $quality);
    }

}