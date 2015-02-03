<?php namespace MovBizz\Production;

use Laracasts\Commander\CommandHandler;
use MovBizz\Locations\LocationRepository;
use Session;

class StoreLocationCommandHandler implements CommandHandler {

	protected $locationRepo;

	/**
	 * [__construct description]
	 * @param LocationRepository $locationRepo [description]
	 */
	function __construct(LocationRepository $locationRepo)
	{
		$this->locationRepo = $locationRepo;
	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$location = $this->locationRepo->findById($command->locationId);
    	$oldRent = 0;

    	if (Session::has('production.location.rent'))
			Session::set('production.total_cost', (Session::get('production.total_cost') - Session::get('production.location.rent')));

		Session::put('production.location.id', $location->id);
		Session::put('production.location.name', $location->name);
		Session::put('production.location.rent', $location->rent);

		// add location rent to production total cost
		if (Session::has('production.total_cost'))
			Session::set('production.total_cost', (Session::get('production.total_cost') + Session::get('production.location.rent')));
		else
			Session::put('production.total_cost', Session::get('production.location.rent'));
    }

}