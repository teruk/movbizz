<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use MovBizz\Charts\Chart;
use MovBizz\Charts\ChartElement;
use MovBizz\Charts\ChartRepository;
use MovBizz\Movies\Movie;
use MovBizz\Movies\MovieRepository;
use Session;

class CalculateChartsCommandHandler implements CommandHandler {

	protected $chartRepo;
	protected $movieRepo;

	function __construct(ChartRepository $chartRepo, MovieRepository $movieRepo) {
		$this->chartRepo = $chartRepo;
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
    	// Session, MovieRepository, ChartRepository, Chart, ChartElement
    	$charts = Session::get('charts');
    	$chartElements = $charts['positions'];

    	foreach ($chartElements as $chartElement) 
    	{
    		if ($chartElement->movie->getPopularityAttribute() <= 1)
    		{
    			$chartElement->movie->setStatusToArchive();
    			// remove chart element from charts
    			unset($chartElements[($chartElement->currentPosition - 1)]);
    		}

    		// calculate the current income, new popularity and increase rounds of every non-player movie
    		if ($chartElement->movie->getStatusAttribute() == 1 && !$chartElement->belongsToPlayer)
    		{
    			$movie = $this->movieRepo->calculateProgress($chartElement->movie);

    			$chartElement->setIncome($movie->getRoundIncomeAttribute());
    		}

    		// update income of the chart element for player movies
    		if ($chartElement->movie->getStatusAttribute() == 1 && $chartElement->belongsToPlayer)
    		{
    			$chartElement->setIncome($chartElement->movie->getRoundIncomeAttribute());
    		}
    	}
    	// add new player movies
    	foreach (Session::get('player.movies') as $playerMovie) {
    		if ($playerMovie->getRoundIncomeAttribute() == 1 && $playerMovie->getStatusAttribute() == 1)
    		{
    			$newChartElement = new ChartElement();
    			$newChartElement->setAttributes($playerMovie, 0, $playerMovie->getRoundIncomeAttribute(), true);

    			array_push($chartElements, $newChartElement);
    		}
    	}
    	// if the number of elements is lower than twenty, generate new ones
    	if (sizeof($chartElements) < 20)
    	{
    		$amountOfNewMovies = 20 - sizeof($chartElements);
    		for ($i=0; $i < $amountOfNewMovies; $i++) { 
				$movie = $this->movieRepo->generateComputerMovie();
                
				$newChartElement = new ChartElement();
				$movie = $this->movieRepo->calculateProgress($movie);

				$newChartElement->setAttributes($movie, 0, $movie->getRoundIncomeAttribute(), false);
				array_push($chartElements, $newChartElement);
			}
    	}

    	// calculate new popularity
    	foreach ($chartElements as $chartElement) {
    		$chartElement->movie->calculateNewPopularity();
    	}
    	
    	// sort new charts
    	$chartElements = $this->chartRepo->sort($chartElements);

    	// cut the charts down to 20 movies
    	// $chartElements = array_slice($chartElements, 0, 20);
    	$charts->setAttributes($chartElements);
    	Session::set('charts', $charts);
    }

}