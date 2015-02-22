<?php namespace MovBizz\Persons;

use MovBizz\Movies\Movie;
use MovBizz\Interfaces\PaginateInterface;
use MovBizz\Interfaces\CalculateInterface;
use MovBizz\Interfaces\FindInterface;

class ActorRepository implements PaginateInterface, FindInterface, CalculateInterface
{

	/**
	 * Fetch a person by their id
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findById($id)
	{
		return Actor::findOrFail($id);
	}

	/**
	 * get a collection of all actors
	 * @return [type] [description]
	 */
	public function getAll()
	{
		return Actor::all();
	}

	/**
	 * [getRolePaginated description]
	 * @param  string  $role    [description]
	 * @param  integer $howMany [description]
	 * @return [type]           [description]
	 */
	public function getPaginated($howMany = 25)
	{
		return Actor::simplePaginate($howMany);
	}

	/**
	 * calculate the new wage of a person after a movie
	 * @param  integer 	$personId [description]
	 * @param  Movie  	$movie  [description]
	 * @return [type]         [description]
	 */
	public function calculate($actorId, $quality = 0)
	{
		$actor = $this->findById($actorId);
		$diff = round(($quality / 10) - $actor->getQualityAttribute());

		// if the difference is positve, the sign will be positive and the wage will increase
		if ($diff >= 0)
			$sign = 1;
		else
			$sign = -1;

		$diff = abs($diff);

		$newWage = round($actor->wage * ( 1 + ( ( mt_rand(0, ( 1 + $diff )) / 100 ) * $sign ) ));

		$actor->setWage($newWage);

		return $actor;
	}
}