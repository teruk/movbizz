<?php namespace MovBizz\Advertisement;

use Laracasts\Commander\CommandHandler;
use Session;

class AdvertiseMovieCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$tvPopularityPerAd = 1;
    	$radioPopularityPerAd = 0.5;
    	$posterPopularityPerAd = 0.25;

    	$movie = Session::get('advertisement.movie');

    	$costs = (Session::get('advertisement.tv') * $command->tv 
    				+ Session::get('advertisement.radio') * $command->radio 
    				+ Session::get('advertisement.poster') * $command->poster);

    	if ($costs > Session::get('player.money'))
    		return false;

    	$popularity = ($tvPopularityPerAd * $command->tv 
    				+ $radioPopularityPerAd * $command->radio 
    				+ $posterPopularityPerAd * $command->poster);

    	$movie->increasePopularity($popularity);
    	$movie->addCosts($costs);

    	Session::set('player.money', (Session::get('player.money') - $costs));

    	// it's only allowed to advertise a movie once per round
    	if (Session::has('advertisement.advertisedMovies'))
    	{
    		$advertisedMovies = Session::get('advertisement.advertisedMovies');
    		array_push($advertisedMovies, $movie);
    		Session::set('advertisement.advertisedMovies', $advertisedMovies);
    	}
    	else 
    		Session::set('advertisement.advertisedMovies', [$movie]);

    	return true;
    }

}