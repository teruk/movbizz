<?php namespace MovBizz\Turn;

class AggregateIncomeCommand {

	public $players;
	
    /**
     */
    public function __construct($players)
    {
    	$this->players = $players;
    }

}