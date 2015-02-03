<?php namespace MovBizz\Production;

use MovBizz\Movies\Movie;

class CalculateNewAssetsCostsCommand {

	public $movie;
	
    /**
     */
    public function __construct(Movie $movie)
    {
    	$this->movie = $movie;
    }

}