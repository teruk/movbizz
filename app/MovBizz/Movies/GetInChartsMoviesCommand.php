<?php namespace MovBizz\Movies;

class GetInChartsMoviesCommand {

    public $players;
	
    /**
     */
    public function __construct($players)
    {
    	$this->players = $players;
    }

}