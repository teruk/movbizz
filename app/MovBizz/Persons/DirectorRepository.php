<?php namespace MovBizz\Persons;

use MovBizz\Movies\Movie;
use MovBizz\Interfaces\PaginateInterface;
use MovBizz\Interfaces\CalculateInterface;
use MovBizz\Interfaces\FindInterface;

class DirectorRepository implements PaginateInterface, FindInterface, CalculateInterface
{

	/**
	 * Fetch a person by their id
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findById($id)
	{
		return Director::findOrFail($id);
	}

	/**
	 * get a collection of all directors
	 * @return [type] [description]
	 */
	public function getAll()
	{
		return Director::all();
	}

	/**
	 * [getRolePaginated description]
	 * @param  string  $role    [description]
	 * @param  integer $howMany [description]
	 * @return [type]           [description]
	 */
	public function getPaginated($howMany = 25)
	{
		return Director::simplePaginate($howMany);
	}

	/**
	 * calculate the new wage of a person after a movie
	 * @param  integer 	$personId [description]
	 * @param  Movie  	$movie  [description]
	 * @return [type]         [description]
	 */
	public function calculate($directorId, $quality = 0)
	{
		$director = $this->findById($directorId);
		$diff = round(($quality / 10) - $director->getQualityAttribute());

		// if the difference is positve, the sign will be positive and the wage will increase
		if ($diff >= 0)
			$sign = 1;
		else
			$sign = -1;

		$diff = abs($diff);

		$newWage = round($director->wage * ( 1 + ( ( mt_rand(1, ( 6 + $diff )) / 100 ) * $sign ) ));

		$director->setWageAttribute($newWage);

		return $director;
	}
}