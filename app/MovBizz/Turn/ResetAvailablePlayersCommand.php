<?php namespace MovBizz\Turn;

class ResetAvailablePlayersCommand {

	public $players;
    /**
     */
    public function __construct($players)
    {
    	$this->players = $players;
    }

}