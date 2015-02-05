<?php namespace MovBizz\Charts;

class ChartRepository {

	/**
	 * sort chart elements primary by income and secondary by title
	 * @param  [type] $chartElements [description]
	 * @return [type]                  [description]
	 */
	public function sort($chartElements)
	{
		foreach ($chartElements as $key => $row) {
		    $income[$key]    = $row['income'];
		    $title[$key] = $row['title'];
		}

		array_multisort($income, SORT_DESC, $title, SORT_ASC, $chartElements);

		foreach ($chartElements as $key => $value) {
			$value['positionLastWeek'] = $value['currentPosition'];
			$value['currentPosition'] = $key + 1;
		}

		return $chartElements;
	}

	/**
	 * add new player movies to the charts
	 * @param [type] $players       [description]
	 * @param [type] $chartElements [description]
	 */
	public function addPlayerMovies($players, $chartElements)
	{
		foreach ($players as $player) {
             
        	foreach ($player->getMoviesAttribute() as $playerMovie) {
        		if ($playerMovie->getRoundAttribute() == 1 && $playerMovie->hasStatusInCharts()) {
        			$newChartElement = new ChartElement();
        			$newChartElement->setAttributes($playerMovie, 0, $playerMovie->getRoundIncomeAttribute(), true, $player);

        			array_push($chartElements, $newChartElement);
        		}
        	}
        }
        return $chartElements;
	}
}