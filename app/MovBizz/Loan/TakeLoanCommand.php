<?php namespace MovBizz\Loan;

class TakeLoanCommand {

	public $amount;
	
    /**
     */
    public function __construct($amount)
    {
    	$this->amount = $amount;
    }

}