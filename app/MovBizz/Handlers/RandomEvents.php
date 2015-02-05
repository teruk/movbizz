<?php namespace MovBizz\Handlers;

/**
* 
*/
class RandomEvents
{
	
	/**
	 * listens for random events
	 * @param  [type] $event [description]
	 * @return [type]        [description]
	 */
	public function subscribe($event)
	{
		$event->listen('randomEvent.drugs', 'MovBizz\RandomEvents\Drugs@run');
		$event->listen('randomEvent.fastWork', 'MovBizz\RandomEvents\FastWork@run');
		$event->listen('randomEvent.lottery', 'MovBizz\RandomEvents\Lottery@run');
		$event->listen('randomEvent.talkshow', 'MovBizz\RandomEvents\Talkshow@run');
		$event->listen('randomEvent.talkshowNegative', 'MovBizz\RandomEvents\TalkshowNegative@run');
		$event->listen('randomEvent.illness', 'MovBizz\RandomEvents\Illness@run');
	}
}