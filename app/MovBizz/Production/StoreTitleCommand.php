<?php namespace MovBizz\Production;

class StoreTitleCommand {

	public $movieTitle;
	
    /**
     */
    public function __construct($movieTitle)
    {
    	$this->movieTitle = $movieTitle;
    }

}