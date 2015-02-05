<?php namespace MovBizz\Turn;

class CalculateIncomeCommand {

    public $players;

    /**
     */
    public function __construct($players)
    {
    	$this->players = $players;
    }

}