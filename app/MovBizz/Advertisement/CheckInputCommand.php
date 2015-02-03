<?php namespace MovBizz\Advertisement;

class CheckInputCommand {

	public $tv;
	public $radio;
	public $poster;
	
    /**
     */
    public function __construct($tv, $radio, $poster)
    {
    	$this->tv = $tv;
    	$this->radio = $radio;
    	$this->poster = $poster;
    }

}