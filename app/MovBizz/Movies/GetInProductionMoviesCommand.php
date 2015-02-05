<?php namespace MovBizz\Movies;

class GetInProductionMoviesCommand {

    public $players;
	
    /**
     */
    public function __construct($players)
    {
    	$this->players = $players;
    }

}