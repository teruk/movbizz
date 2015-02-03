<?php namespace MovBizz\Advertisement;

class StoreMovieCommand {

	public $round;
	
    /**
     */
    public function __construct($round)
    {
    	$this->round = $round;
    }

}