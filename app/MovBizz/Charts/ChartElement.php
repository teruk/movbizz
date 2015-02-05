<?php namespace MovBizz\Charts;
use Eloquent;
use MovBizz\Movies\Movie;
/**
* 
*/
class ChartElement extends Eloquent
{
	/**
	 * [$fillable description]
	 * @var [type]
	 */
	protected $fillable = ['movie', 'currentPosition', 'positionLastWeek', 'income', 'belongsToPlayer', 'player'];

	/**
	 * set the attribute of the element
	 * @param Movie  $movie           [description]
	 * @param [type] $currentPositon  [description]
	 * @param [type] $income          [description]
	 * @param [type] $belongsToPlayer [description]
	 */
	public function setAttributes(Movie $movie, $currentPosition, $income, $belongsToPlayer, $player = "")
	{
		$this->attributes['movie'] = $movie;
		$this->attributes['currentPosition'] = $currentPosition;
		$this->attributes['positionLastWeek'] = 0;
		$this->attributes['income'] = $income;
		$this->attributes['belongsToPlayer'] = $belongsToPlayer;
		$this->attributes['player'] = $player;
	}

	/**
	 * set the attribute income
	 * @param [type] $income [description]
	 */
	public function setIncome($income)
	{
		$this->attributes['income'] = $income;
	}

	/**
	 * set the attribute current position and update last weeks position
	 * @param [type] $pos [description]
	 */
	public function setCurrentPosition($pos)
	{
		$this->attributes['positionLastWeek'] = $this->setPositionLastWeek($this->currentPositon);
		$this->attributes['currentPosition'] = $pos;
	}

	/**
	 * set the attribute position last week
	 * @param [type] $pos [description]
	 */
	public function setPositionLastWeek($pos)
	{
		$this->attributes['positionLastWeek'] = $pos;
	}

	/**
	 * return get background color
	 * @return [type] [description]
	 */
	public function getBackgroundColorAttribute()
	{
		return $this->attributes['backgroundColor'];
	}

	/**
	 * return current position
	 * @return [type] [description]
	 */
	public function getCurrentPositionAttribute()
	{
		return $this->attributes['currentPosition'];
	}

	/**
	 * return income
	 * @return [type] [description]
	 */
	public function getIncomeAttribute()
	{
		return $this->attributes['income'];
	}

	/**
	 * return movie
	 * @return [type] [description]
	 */
	public function getMovieAttribute()
	{
		return $this->attributes['movie'];
	}

	/**
	 * return player referenc
	 * @return [type] [description]
	 */
	public function getPlayerAttribute()
	{
		return $this->attributes['player'];
	}
}