<?php namespace MovBizz\Locations;

use MovBizz\Movies\Movie;
use MovBizz\Interfaces\PaginateInterface;
use MovBizz\Interfaces\CalculateInterface;
use MovBizz\Interfaces\FindInterface;
use MovBizz\Interfaces\QualityInterface;

class LocationRepository implements PaginateInterface, FindInterface, CalculateInterface
{

	/**
	 * Fetch a location by their id
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findById($id)
	{
		return Location::findOrFail($id);
	}

	/**
	 * return collection of all locations
	 * @return [type] [description]
	 */
	public function getAll()
	{
		return Location::all();
	}

	/**
	 * Paginate a list of locations
	 * @param  integer $howMany [description]
	 * @return [type]           [description]
	 */
	public function getPaginated($howMany = 25)
	{
		return Location::simplePaginate($howMany);
	}

	/**
	 * calculates the new rent after a movie based on the quality
	 * @param  integer 	$locationId [description]
	 * @param  Movie    $movie    [description]
	 * @return [type]             [description]
	 */
	public function calculate($locationId, $quality = 0)
	{
		$location = $this->findById($locationId);
		$diff = round(($quality / 10) - $location->getQualityAttribute());

		// if the difference is positve, the sign will be positive and the rent will increase
		if ($diff >= 0)
			$sign = 1;
		else
			$sign = -1;

		$diff = abs($diff);

		$newRent = round($location->rent * ( 1 + ( ( mt_rand(1, ( 6 + $diff )) / 100 ) * $sign ) ));
		$location->setRentAttribute($newRent);

		return $location;
	}
}