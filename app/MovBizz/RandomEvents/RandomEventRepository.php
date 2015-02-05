<?php namespace MovBizz\RandomEvents;

class RandomEventRepository
{
	/**
	 * array with existing random events
	 * make sure that MovBizz\Handlers\RandomEvents listen to these events
	 * in order to execute them
	 * 
	 * @var [type]
	 */
	protected $randomEvents = [
		'randomEvent.drugs',
		'randomEvent.lottery',
		'randomEvent.talkshow',
		'randomEvent.fastWork',
		'randomEvent.talkshowNegative',
		'randomEvent.illness'
		];

	/**
	 * returns a random event
	 * @return String [description]
	 */
	public function getRandomEvent()
	{
		$event = $this->randomEvents[mt_rand(0, (sizeOf($this->randomEvents)-1))];
		return $event;
	}


}