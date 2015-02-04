<?php namespace MovBizz\GameSession;

class StartGameCommand {

	/**
	 * Name of the player
	 * @var [type]
	 */
	public $playerNames;

    /**
     */
    public function __construct($playerNames)
    {
    	$this->playerNames = $playerNames;
    }

}