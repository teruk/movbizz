<?php namespace MovBizz\Production;

use Laracasts\Commander\CommandHandler;
use MovBizz\Movies\Movie;
use MovBizz\Movies\MovieRepository;

class CalculateNewAssetsCostsCommandHandler implements CommandHandler {

	protected $movieRepo;
	/**
	 * [__construct description]
	 * @param LocationRepository $locationRepo [description]
	 * @param PersonRepository   $personRepo   [description]
	 */
	function __construct(MovieRepository $movieRepo) {
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
    	return $this->movieRepo->calculateNewAssetsCosts($command->movie);
    }

}