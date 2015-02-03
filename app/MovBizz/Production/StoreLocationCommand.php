<?php namespace MovBizz\Production;

class StoreLocationCommand {

	public $locationId;
	
    /**
     */
    public function __construct($locationId)
    {
    	$this->locationId = $locationId;
    }

}