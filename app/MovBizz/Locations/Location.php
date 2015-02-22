<?php namespace MovBizz\Locations;

use Eloquent;
use MovBizz\Interfaces\QualityInterface;

class Location extends Eloquent implements QualityInterface
{
	/**
	 * [$fillable description]
	 * @var [type]
	 */
	protected $fillable = ['name', 'quality', 'rent'];

	/**
	 * The database table used by the model
	 * @var string
	 */
	protected $table = 'locations';

	/**
	 * set the attribute rent
	 * @param [type] $newRent [description]
	 */
	public function setRent($newRent)
	{
		$this->attributes['rent'] = $newRent;
	}

	/**
	 * return the quality attribute
	 * @return [type] [description]
	 */
	public function getQualityAttribute()
	{
		return $this->attributes['quality'];
	}

}