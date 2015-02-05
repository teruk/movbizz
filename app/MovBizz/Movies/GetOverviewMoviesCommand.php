<?php namespace MovBizz\Movies;

class GetOverviewMoviesCommand {

	public $player;
    /**
     */
    public function __construct($player)
    {
    	$this->player = $player;
    }

}