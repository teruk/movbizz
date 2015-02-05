<?php namespace MovBizz\Turn;

class DetermLoansCommand {

	public $players;
    /**
     */
    public function __construct($players)
    {
    	$this->players = $players;
    }

}