<?php namespace MovBizz\Production;

use Laracasts\Commander\CommandHandler;
use MovBizz\Persons\ActorRepository;
use Session;

class StoreActorCommandHandler implements CommandHandler {

	protected $actorRepo;

	/**
	 * constructor
	 * @param actorRepository $actorRepo [description]
	 */
	function __construct(ActorRepository $actorRepo)
	{
		$this->actorRepo = $actorRepo;
	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$actor = $this->actorRepo->findById($command->actorId);

    	if (Session::has('production.actor.wage'))
			Session::set('production.total_cost', (Session::get('production.total_cost') - Session::get('production.actor.wage')));

		Session::put('production.actor.id', $actor->id);
		Session::put('production.actor.name', $actor->present()->name);
		Session::put('production.actor.wage', $actor->wage);

		// add actor wage to production total cost
		if (Session::has('production.total_cost'))
			Session::set('production.total_cost', (Session::get('production.total_cost') + Session::get('production.actor.wage')));
		else
			Session::put('production.total_cost', Session::get('production.actor.wage'));
    }

}