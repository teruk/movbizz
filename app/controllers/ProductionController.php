<?php

use MovBizz\Persons\ActorRepository;
use MovBizz\Persons\DirectorRepository;
use MovBizz\Locations\LocationRepository;
use MovBizz\Production\CalculateNewAssetsCostsCommand;
use MovBizz\Production\CalculateQualityCommand;
use MovBizz\Production\StartProductionCommand;
use MovBizz\Production\StoreActorCommand;
use MovBizz\Production\StoreDirectorCommand;
use MovBizz\Production\StoreLocationCommand;
use MovBizz\Production\StoreTitleCommand;

class ProductionController extends \BaseController {

	protected $locationRepository;
	protected $actorRepository;
	protected $directorRepository;

	function __construct(ActorRepository $actorRepository, DirectorRepository $directorRepository, LocationRepository $locationRepository)
	{
		$this->actorRepository = $actorRepository;
		$this->directorRepository = $directorRepository;
		$this->locationRepository = $locationRepository;
	}

	/**
	 * show the page to input a title
	 * @return [type] [description]
	 */
	public function selectTitle()
	{
		return View::make('production.title');
	}

	/**
	 * store the title in a session variable
	 * @return [type] [description]
	 */
	public function storeTitle()
	{
		//  store title in session
		$input = array_add([], 'movieTitle', Input::get('title'));
		$this->execute(StoreTitleCommand::class, $input);

		return Redirect::route('selectActor_path');
	}

	/**
	 * return view to select actors
	 * @return [type] [description]
	 */
	public function selectActor()
	{
		//  grab all actors from db
		$actors = $this->actorRepository->getPaginated(20);
		//  return view
		return View::make('production.actor', compact('actors'));
		//return View::make('production.actor')->withPersons($actors);
	}

	/**
	 * store the actor information in an session array
	 * @return [type] [description]
	 */
	public function storeActor()
	{
		$input = array_add([], 'actorId', Input::get('actor'));
		$this->execute(StoreActorCommand::class, $input);

		return Redirect::route('selectDirector_path');
	}

	/**
	 * return view to select a director
	 * @return [type] [description]
	 */
	public function selectDirector()
	{
		//  grab all actors from db
		$directors = $this->directorRepository->getPaginated(20);
		//  return view
		return View::make('production.director', compact('directors'));
		
	}

	/**
	 * store the actor information in an session array
	 * @return [type] [description]
	 */
	public function storeDirector()
	{
		$input = array_add([], 'directorId', Input::get('director'));
		$this->execute(StoreDirectorCommand::class, $input);

		return Redirect::route('selectLocation_path');
	}

	/**
	 * return view to select a location
	 * @return [type] [description]
	 */
	public function selectLocation()
	{
		//  grab all actors from db
		$locations = $this->locationRepository->getPaginated(20);;
		//  return view
		return View::make('production.location', compact('locations'));
		
	}

	/**
	 * store the actor information in an session array
	 * @return [type] [description]
	 */
	public function storeLocation()
	{
		$input = array_add([], 'locationId', Input::get('location'));
		$this->execute(StoreLocationCommand::class, $input);

		return Redirect::route('selectionSummary_path');
	}

	/**
	 * return summary
	 * TODO: refactoring nessesary
	 * @return [type] [description]
	 */
	public function getSummary()
	{
		if (Session::has('production')) {
			$production = Session::get('production');

			$affordable = true;
			if ($production['total_cost'] > Session::get('game.currentPlayer')->getMoneyAttribute())
				$affordable = false;

			return View::make('production.summary', compact('production', 'affordable'));
		}

		Flash::error('You need to start a new movie first!');
		return Redirect::route('menu_path');
	}

	/**
	 * start the production of the movie
	 * @return [type] [description]
	 */
	public function startProduction()
	{
		$this->execute(CalculateQualityCommand::class);
		$movie = $this->execute(StartProductionCommand::class);

		$input = array_add([], 'movie', $movie);
		$this->execute(CalculateNewAssetsCostsCommand::class, $input);

		Flash::success('Production was started.');

		return Redirect::route('menu_path');

	}

}
