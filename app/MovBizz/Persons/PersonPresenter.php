<?php namespace MovBizz\Persons;

use Laracasts\Presenter\Presenter;

class PersonPresenter extends Presenter {

	/**
	 * Returns the full name of the person
	 * @return [type] [description]
	 */
	public function name()
	{
		$name = $this->entity->firstname.' '.$this->entity->name; 
		return $name;
	}
}