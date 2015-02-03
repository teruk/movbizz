<?php namespace MovBizz\Interfaces;

interface CalculateInterface
{
	/**
	 * calculate the new price of an object
	 * @param  QualityInterface $obj     [description]
	 * @param  integer          $quality [description]
	 * @return QualityInterface          [description]
	 */
	public function calculate($id, $quality);
}