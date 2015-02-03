<?php namespace MovBizz\Statistics;

use Eloquent;

class Statistic extends Eloquent
{
	/**
	 * [$fillable description]
	 * @var [type]
	 */
	protected $fillable = ['name', 'value'];

	public $rules = [
		'name' => 'required|unique:statistics',
		];

	/**
	 * [$table description]
	 * @var string
	 */
	protected $table = 'statistics';

	/**
	 * [$timestamps description]
	 * @var boolean
	 */
	public $timestamps = false;

	/**
	 * set attribute value
	 * @param [type] $value [description]
	 */
	public function setValueAttribute($value)
	{
		$this->attributes['value'] = $value;
	}

	/**
	 * return value attribute
	 * @return [type] [description]
	 */
	public function getValueAttribute()
	{
		return $this->attributes['value'];
	}

}
