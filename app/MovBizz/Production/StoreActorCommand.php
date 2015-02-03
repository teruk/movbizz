<?php namespace MovBizz\Production;

class StoreActorCommand {

	public $actorId;
	
    /**
     */
    public function __construct($actorId)
    {
    	$this->actorId = $actorId;
    }

}