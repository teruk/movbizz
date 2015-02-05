<?php namespace MovBizz\Turn;

class RunRandomEventCommand {

    public $players;

    /**
     */
    public function __construct($players)
    {
    	$this->players = $players;
    }

}