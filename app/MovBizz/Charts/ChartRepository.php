<?php namespace MovBizz\Charts;

class ChartRepository {

	/**
	 * sort chart elements primary by income and secondary by title
	 * @param  [type] $chartElemements [description]
	 * @return [type]                  [description]
	 */
	public function sort($chartElemements)
	{
		foreach ($chartElemements as $key => $row) {
		    $income[$key]    = $row['income'];
		    $title[$key] = $row['title'];
		}

		array_multisort($income, SORT_DESC, $title, SORT_ASC, $chartElemements);

		foreach ($chartElemements as $key => $value) {
			$value['positionLastWeek'] = $value['currentPosition'];
			$value['currentPosition'] = $key + 1;
		}

		return $chartElemements;
	}
}