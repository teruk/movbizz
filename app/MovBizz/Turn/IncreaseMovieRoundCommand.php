<?php namespace MovBizz\Turn;

class IncreaseMovieRoundCommand {

    public $players;

    /**
     */
    public function __construct($players)
    {
    	$this->players = $players;
    }

}