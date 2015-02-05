<?php namespace MovBizz\Movies;

use Laracasts\Commander\CommandHandler;

class GetOverviewMoviesCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
		$movies = [];
		if (sizeof($command->player->getMoviesAttribute()) > 0) {

			foreach ($command->player->getMoviesAttribute() as $movie) {
				if (!$movie->hasStatusInProduction())
					array_push($movies, $movie);
			}
			
		}
		return $movies;
    }

}