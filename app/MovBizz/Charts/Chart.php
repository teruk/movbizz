<?php namespace MovBizz\Charts;
use Eloquent;

/**
 * description
 */
class Chart extends Eloquent
{
	/**
	 * [$fillable description]
	 * @var [type]
	 */
	protected $fillable = ['positions'];

	function __construct() {
		$this->attributes['positions'] = [];
	}

	/**
	 * [setAttributes description]
	 * @param [type] $data [description]
	 */
	public function setAttributes($data)
	{
		$this->attributes['positions'] = $data;
	}
}