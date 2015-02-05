<?php namespace MovBizz\Turn;

class CalculateAwardsCommand {

	public $players;
	
    /**
     */
    public function __construct($players)
    {
    	$this->players = $players;
    }

}