<?php namespace MovBizz\Advertisement;

use Laracasts\Commander\CommandHandler;
use Session;

class CalculateAdvertisementPricesCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$tvAdvertisement = mt_rand(120000, 160000);
    	Session::set('advertisement.tv', $tvAdvertisement);

    	$radioAdvertisement = mt_rand(75000, 120000);
    	Session::set('advertisement.radio', $radioAdvertisement);

    	$posterAdvertisement = mt_rand(40000, 75000);
    	Session::set('advertisement.poster', $posterAdvertisement);

    	return Session::get('advertisement');
    }

}