<?php namespace MovBizz\Interfaces;

interface FindInterface
{
	/**
	 * find an object by its id
	 * @param  [type] $id [description]
	 * @return mixed [description]
	 */
	public function findById($id);

	/**
	 * get a collection of all objects
	 * @return [type] [description]
	 */
	public function getAll();
}