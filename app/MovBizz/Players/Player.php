<?php namespace MovBizz\Players;

use MovBizz\Movies\Movie;
/**
* 
*/
class Player
{
	
	protected $fillable = ['name', 'money', 'loan', 'movies', 'awardCandidates', 'bg-color', 'event'];

	/**
	 * return name attribute
	 * @return [type] [description]
	 */
	public function getNameAttribute()
	{
		return $this->attributes['name'];
	}

	/**
	 * return money attribute
	 * @return [type] [description]
	 */
	public function getMoneyAttribute()
	{
		return $this->attributes['money'];
	}

	/**
	 * return loan attribute
	 * @return [type] [description]
	 */
	public function getLoanAttribute()
	{
		return $this->attributes['loan'];
	}

	/**
	 * return movies attribute
	 * @return [type] [description]
	 */
	public function getMoviesAttribute()
	{
		return $this->attributes['movies'];
	}

	/**
	 * return award candidates attribute
	 * @return [type] [description]
	 */
	public function getAwardCandidatesAttribute()
	{
		return $this->attributes['awardCandidates'];
	}

	/**
	 * return bg-color attribute
	 * @return [type] [description]
	 */
	public function getBgColorAttribute()
	{
		return $this->attributes['bg-color'];
	}

	/**
	 * return event attribute
	 * @return [type] [description]
	 */
	public function getEventAttribute()
	{
		return $this->attributes['event'];
	}

	/**
	 * initiates player attributes at the start
	 * @param  String $name    [description]
	 * @param  String $bgColor [description]
	 * @return void          [description]
	 */
	public function initiate($name, $bgColor)
	{
		$this->attributes['name'] = $name;
		$this->attributes['money'] = 1500000;
		$this->attributes['loan'] = 0;
		$this->attributes['movies'] = [];
		$this->attributes['awardCandidates'] = [];
		$this->attributes['bg-color'] = $bgColor;
	}

	/**
	 * adds a given amount to money attribute
	 * @param [type] $amount [description]
	 */
	public function addMoney($amount)
	{
		$this->attributes['money'] = $this->getMoneyAttribute() + $amount;
	}

	/**
	 * removes a given amount from money attribute
	 * @param  [type] $amount [description]
	 * @return [type]         [description]
	 */
	public function payMoney($amount)
	{
		$this->attributes['money'] = $this->getMoneyAttribute() - $amount;
	}

	/**
	 * increase loan attribute and adds to the players money
	 * @param  [type] $amount [description]
	 * @return [type]         [description]
	 */
	public function takeLoan($amount)
	{
		$this->attributes['loan'] = $this->getLoanAttribute() + $amount;
		$this->addMoney($amount);
	}

	/**
	 * decreases loan attribute and takes money from the players wallet
	 * @param  [type] $amount [description]
	 * @return [type]         [description]
	 */
	public function payBackLoan($amount)
	{
		$this->payMoney($amount);
		$this->attributes['loan'] = $this->getLoanAttribute() - $amount;
	}

	/**
	 * add a movie to player
	 * @param Movie $movie [description]
	 */
	public function addMovie(Movie $newMovie)
	{
		$movies = $this->getMoviesAttribute();
		array_push($movies, $newMovie);
		$this->attributes['movies'] = $movies;
	}

	/**
	 * add an award caindidate
	 * @param Movie $movie [description]
	 */
	public function addAwardCandidate(Movie $candidate)
	{
		$awardCandidates = $this->getAwardCandidatesAttribute();
		array_push($awardCandidates, $candidate);
		$this->attributes['awardCandidates'] = $awardCandidates;
	}

	/**
	 * clear award candidates
	 * @return [type] [description]
	 */
	public function clearAwardCandidates()
	{
		$this->attributes['awardCandidates'] = [];
	}

	/**
	 * set event attribute
	 * @param [type] $message [description]
	 */
	public function setEventAttribute($message)
	{
		$this->attributes['event'] = $message;
	}
}