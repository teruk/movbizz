<?php namespace MovBizz\Movies;

use Eloquent;
use Laracasts\Presenter\PresentableTrait;
use MovBizz\Interfaces\QualityInterface;

class Movie extends Eloquent implements QualityInterface {

	use PresentableTrait;

	/**
	 * [$fillable description]
	 * @var [type]
	 */
	protected $fillable = [
		'title', 
		'actorId', 
		'directorId', 
		'locationId', 
		'costs', 
		'income', 
		'status', 
		'quality', 
		'runningCosts', 
		'round', 
		'popularity', 
		'roundIncome'
		];

	/**
	 * The database table used by the model
	 * @var string
	 */
	protected $table = 'movies';

	/**
	 * Path to presenter person
	 * @var string
	 */
	protected $presenter = 'MovBizz\Movies\MoviePresenter';

	/**
	 * [setAttributes description]
	 * @param [type] $data [description]
	 */
	public function setAttributes($data)
	{
		$this->attributes['title'] = $data['title'];
		$this->attributes['actorId'] = $data['actor']['id'];
		$this->attributes['directorId'] = $data['director']['id'];
		$this->attributes['locationId'] = $data['location']['id'];
		$this->attributes['costs'] = $data['total_cost'];
		$this->attributes['income'] = 0;
		$this->attributes['status'] = 0;
		$this->attributes['quality'] = $data['quality'];
		$this->attributes['runningCosts'] = 0;
		$this->attributes['round'] = $this->calculateStartRound();
		$this->attributes['popularity'] = $this->calculateStartPopularity();
		$this->attributes['roundIncome'] = 0;
	}

	/**
	 * set the attribute running costs
	 * @param [type] $costs [description]
	 */
	public function setRunningCosts($costs)
	{
		$this->attributes['runningCosts'] = $costs;
	}

	/**
	 * increase the number of rounds by one
	 * @return [type] [description]
	 */
	public function increaseRounds()
	{
		$this->attributes['round'] = $this->getRoundAttribute() + 1;
	}

	/**
	 * decrease the number of round by one
	 * @return [type] [description]
	 */
	public function decreaseRounds()
	{
		$this->attributes['round'] = $this->getRoundAttribute() - 1;
	}

	/**
	 * set the attribute round to a specific round
	 * @param [type] $numberOfRound [description]
	 */
	public function setRoundCounter($numberOfRound)
	{
		$this->attributes['round'] = $numberOfRound;
	}

	/**
	 * change the movie status to in charts
	 */
	public function setStatusToInCharts()
	{
		$this->attributes['status'] = 1;
	}

	/**
	 * change the movie status to archive
	 */
	public function setStatusToArchive()
	{
		$this->attributes['status'] = 2;
	}

	/**
	 * increase the cost by a specific amount
	 * @param [type] $costs [description]
	 */
	public function addCosts($costs)
	{
		$this->attributes['costs'] = $this->getCostAttribute() + $costs;
	}

	/**
	 * increase the popularity of the movie by a given amount
	 * @param  [type] $popularity [description]
	 * @return [type]             [description]
	 */
	public function increasePopularity($popularity)
	{
		$this->attributes['popularity'] = $this->getQualityAttribute() + $popularity;
	}

	/**
	 * divides the popularity through the number of rounds
	 * @return [type] [description]
	 */
	public function calculateNewPopularity()
	{
		$this->attributes['popularity'] = $this->getPopularityAttribute() - ( 
			( 10 + floor( log( $this->getRoundAttribute() ) ) * ( 
				1 - $this->getQualityAttribute() / $this->getRoundAttribute() / 100)
				) 
			);
	}

	/**
	 * set the attribute round income
	 * @param [type] $income [description]
	 */
	public function setRoundIncome($income)
	{
		$this->attributes['roundIncome'] = $income;
	}

	/**
	 * add the round income to the total income
	 * @return [type] [description]
	 */
	public function increaseIncome()
	{
		$this->attributes['income'] = $this->getIncomeAttribute() + $this->getRoundIncomeAttribute();
	}

	/**
	 * return quality attribute
	 * @return [type] [description]
	 */
	public function getQualityAttribute()
	{
		return $this->attributes['quality'];
	}

	/**
	 * return id of actor
	 * @return [type] [description]
	 */
	public function getActorIdAttribute()
	{
		return $this->attributes['actorId'];
	}

	/**
	 * return title of the movie
	 * @return [type] [description]
	 */
	public function getTitleAttribute()
	{
		return $this->attributes['title'];
	}

	/**
	 * returns cost atttribute
	 * @return [type] [description]
	 */
	public function getCostAttribute()
	{
		return $this->attributes['costs'];
	}

	/**
	 * return round attribute
	 * @return [type] [description]
	 */
	public function getRoundAttribute()
	{
		return $this->attributes['round'];
	}

	/**
	 * return popularity attribute
	 * @return [type] [description]
	 */
	public function getPopularityAttribute()
	{
		return $this->attributes['popularity'];
	}

	/**
	 * return income attribute
	 * @return [type] [description]
	 */
	public function getIncomeAttribute()
	{
		return $this->attributes['income'];
	}

	/**
	 * return round income attribute
	 * @return [type] [description]
	 */
	public function getRoundIncomeAttribute()
	{
		return $this->attributes['roundIncome'];
	}

	/**
	 * return movie status
	 * @return [type] [description]
	 */
	public function getStatusAttribute()
	{
		return $this->attributes['status'];
	}

	/**
	 * calculates how many round are need for production
	 * @return [type] [description]
	 */
	private function calculateStartRound()
	{
		return floor($this->getQualityAttribute() / 20) * -1;
	}

	/**
	 * calculates the start popularity of the movie
	 * @return [type] [description]
	 */
	private function calculateStartPopularity()
	{
		return round( $this->getQualityAttribute() * 0.55 + $this->getCostAttribute() * 0.275 / 3300000 + 0);
	}

	/**
	 * returns true if movie is in production
	 * @return boolean [description]
	 */
	public function hasStatusInProduction()
	{
		if ($this->getStatusAttribute() == 0)
			return true;

		return false;
	}

	/**
	 * returns true if movie is in charts
	 * @return boolean [description]
	 */
	public function hasStatusInCharts()
	{
		if ($this->getStatusAttribute() == 1)
			return true;

		return false;
	}

	/**
	 * return true if movie is in archive
	 * @return boolean [description]
	 */
	public function hasStatusInArchive()
	{
		if ($this->getStatusAttribute() == 2)
			return true;

		return false;
	}

}