<?php namespace MovBizz\Turn;

class CalculateChartsCommand {

    public $players;

    /**
     */
    public function __construct($players)
    {
    	$this->players = $players;
    }

}