<?php namespace MovBizz\Movies;

use Laracasts\Presenter\Presenter;

class MoviePresenter extends Presenter{

	/**
	 * return the quality as icons
	 * @return [type] [description]
	 */
	public function quality()
	{
		$stars = floor(($this->entity->quality + 10) / 20);
		$output = "";

		for ($i = 0; $i < $stars; $i++)
		{
			$output .= "<i class='fa fa-star'></i>";
		}

		if (bcmod(($this->entity->quality / 10), 2) == 1 && $stars != 5)
			$output .= "<i class='fa fa-star-half'></i>";

		return $output;
	}

	/**
	 * return the rating after production end
	 * @return [type] [description]
	 */
	public function rating()
	{
		$stars = floor(($this->entity->quality + 10) / 20);

		switch ($stars) {
			case 5:
				return "This is one the best movies ever!";
			case 4:
				return "A good movie!";
			case 3:
				return "An average movie!";
			case 2:
				return "The movie is nothing!";
			case 1:
				return "Boring and bad movie!";
			default:
				return "Error!";
		}
	}
}