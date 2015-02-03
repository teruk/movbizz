<?php namespace MovBizz\Production;

use Laracasts\Commander\CommandHandler;
use MovBizz\Persons\directorRepository;
use Session;

class StoreDirectorCommandHandler implements CommandHandler {

	protected $directorRepo;

	/**
	 * constructor
	 * @param directorRepository $directorRepo [description]
	 */
	function __construct(DirectorRepository $directorRepo)
	{
		$this->directorRepo = $directorRepo;
	}
	
    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$director = $this->directorRepo->findById($command->directorId);
    	$oldWage = 0;

    	if (Session::has('production.director.wage'))
			Session::set('production.total_cost', (Session::get('production.total_cost') - Session::get('production.director.wage')));

		Session::put('production.director.id', $director->id);
		Session::put('production.director.name', $director->present()->name);
		Session::put('production.director.wage', $director->wage);

		// add director wage to production total cost
		if (Session::has('production.total_cost'))
			Session::set('production.total_cost', (Session::get('production.total_cost') + Session::get('production.director.wage')));
		else
			Session::put('production.total_cost', Session::get('production.director.wage'));
    }

}