<?php namespace MovBizz\Interfaces;

interface PaginateInterface
{
	/**
	 * [getPaginated description]
	 * @param  integer $howMany [description]
	 * @return [type]           [description]
	 */
	public function getPaginated($howMany = 25);
}
