<?php namespace MovBizz\Turn;

class PayInterestCommand {

	public $players;

    /**
     */
    public function __construct($players)
    {
    	$this->players = $players;
    }

}