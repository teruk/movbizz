<?php

class AwardsController extends \BaseController {

	/**
	 * show award winners
	 * @return [type] [description]
	 */
	public function show()
	{
		if (Session::get('awards.on')) {
			$winners = Session::get('awards.winners');
			Session::set('awards.on', false);

			return View::make('awards.overview', compact('winners'));
		}

		Flash::error('There is no award show this round!');
		return Redirect::back();
	}

}
