<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function home()
	{
		return View::make('pages.home');
	}

	/**
	 * display faqs
	 * @return [type] [description]
	 */
	public function showFAQ()
	{
		return View::make('pages.faq');
	}
}
