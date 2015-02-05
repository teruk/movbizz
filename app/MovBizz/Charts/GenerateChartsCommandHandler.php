<?php namespace MovBizz\Charts;

use Laracasts\Commander\CommandHandler;
use MovBizz\Movies\Movie;
use MovBizz\Movies\MovieRepository;
use MovBizz\Charts\ChartRepository;
use Session;

class GenerateChartsCommandHandler implements CommandHandler {

	protected $movieRepo;
	protected $chartRepo;

	/**
	 * constructor
	 * @param MovieRepository $movieRepo [description]
	 * @param ChartRepository $chartRepo [description]
	 */
	function __construct(MovieRepository $movieRepo, ChartRepository $chartRepo) {
		$this->movieRepo = $movieRepo;
		$this->chartRepo = $chartRepo;
	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$charts = new Chart();

    	$chartElements = array();

    	for ($i=0; $i < 20; $i++) { 
    		$movie = $this->movieRepo->generateComputerMovie();
    		$chartElement = new ChartElement();
    		$movie = $this->movieRepo->calculateProgress($movie);

    		$chartElement->setAttributes($movie, 0, $movie->roundIncome, false, 'active');
    		array_push($chartElements, $chartElement);
    	}
    	$chartElements = $this->chartRepo->sort($chartElements);

    	$charts->setAttributes($chartElements);
    	Session::put('charts', $charts);
    }

}