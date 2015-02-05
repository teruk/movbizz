<?php namespace MovBizz\GameSession;

class SaveNumberOfPlayersCommand {

	public $numberOfPlayers;
    /**
     */
    public function __construct($numberOfPlayers)
    {
    	$this->numberOfPlayers = $numberOfPlayers;
    }

}