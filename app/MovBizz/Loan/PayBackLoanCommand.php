<?php namespace MovBizz\Loan;

class PayBackLoanCommand {

	public $amount;
    /**
     */
    public function __construct($amount)
    {
    	$this->amount = $amount;
    }

}