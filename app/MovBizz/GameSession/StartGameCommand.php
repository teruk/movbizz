<?php namespace MovBizz\GameSession;

class StartGameCommand {

	/**
	 * Name of the player
	 * @var [type]
	 */
	public $playerName;

    /**
     */
    public function __construct($playerName)
    {
    	$this->playerName = $playerName;
    }

}