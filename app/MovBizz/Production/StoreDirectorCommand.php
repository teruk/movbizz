<?php namespace MovBizz\Production;

class StoreDirectorCommand {

	public $directorId;
	
    /**
     */
    public function __construct($directorId)
    {
    	$this->directorId = $directorId;
    }

}