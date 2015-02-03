<?php  namespace MovBizz\Persons;

use Eloquent;
use MovBizz\Interfaces\QualityInterface;
use Laracasts\Presenter\PresentableTrait;
use MovBizz\Interfaces\PersonInterface;

class Director extends Eloquent implements PersonInterface, QualityInterface
{
	use PresentableTrait;

	/**
	 * [$fillable description]
	 * @var [type]
	 */
	public $fillable = ['firstname', 'name', 'talent', 'wage'];

	/**
	 * The database table used by the model
	 * @var string
	 */
	protected $table = 'directors';

	/**
	 * Path to presenter person
	 * @var string
	 */
	public $presenter = 'MovBizz\Persons\PersonPresenter';

	/**
	 * set the attribute wage
	 * @param [type] $newWage [description]
	 */
	public function setWageAttribute($newWage)
	{
		$this->attributes['wage'] = $newWage;
	}

	/**
	 * return quality attribute
	 * @return [type] [description]
	 */
	public function getQualityAttribute()
	{
		return $this->attributes['talent'];
	}
}