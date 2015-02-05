<?php namespace MovBizz\Turn;

class PayRunningCostsCommand {

    public $players;

    /**
     */
    public function __construct($players)
    {
    	$this->players = $players;
    }

}