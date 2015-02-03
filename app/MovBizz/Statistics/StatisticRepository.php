<?php namespace MovBizz\Statistics;

class StatisticRepository
{
	/**
	 * find statistic by name
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function findByName($name)
	{
		return Statistic::where('name', '=', $name)->first();
	}

	/**
	 * increasing statistic by one
	 * @param  [type] $nameOfSetting [description]
	 * @return [type]                [description]
	 */
	public function increaseCount($nameOfSetting)
	{
		$statistic = $this->findByName($nameOfSetting);
		$statistic->setValueAttribute( $statistic->getValueAttribute() + 1 );
		$statistic->save();
	}

}