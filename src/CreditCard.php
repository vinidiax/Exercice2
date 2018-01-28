<?php

namespace CreditCard;

class CreditCard
{
	private $cardNumber;
	private $error;
	
	/**
	 * Category => First Digit
	 * @var array
	 */
	protected static $cardCategoryByFirstDigit = [
		2 => 3,
		3 => 4,
		4 => 2,
		5 => 2
	];
	
	protected static $cardLengthByCategory = [
		2 => 16,
		3 => 15,
		4 => 14
	];
	
	public function checkLength($category,$length)
	{
		if($length == self::$cardLengthByCategory[$category]){
			return $length;
		}
		return 1;
	}

	function isValid($cardNumber = NULL)
	{
		
		if (!is_null($cardNumber))
		{
			$cardNumber = preg_replace('/[^0-9]/', '', $cardNumber);
			
			$this->cardNumber  = NULL;
			$this->error   = 'ERROR_NOT_SET';
			
			if ($this->checkLength($cardNumber[0],strlen($cardNumber)) == 1) {
				$this->error  = 'ERROR_INVALID_LENGTH';
			} else {
				$this->cardNumber = $cardNumber;
				$this->error  = true;
			}
		} else {
			$this->error = 'ERROR_INVALID_CHAR';
		}

		return $this->error;
	}

	function setCardNumber($cardNumber = NULL)
	{
		if (!is_null($cardNumber))                  // anything passed?
			return $this->isValid($cardNumber);     // yes, check/update the number

		$this->cardNumber   =  NULL;
		$this->error        = 'ERROR_NOT_SET';
	}
	
	function getCardNumber()
	{
		return $this->cardNumber;
	}
	

}

/**
 *   LIBRARY:
 *   Visa = 4XXX - XXXX - XXXX - XXXX
 *   MasterCard = 5[1-5]XX - XXXX - XXXX - XXXX
 *   Discover = 6011 - XXXX - XXXX - XXXX
 *   Amex = 3[4,7]X - XXXX - XXXX - XXXX
 *   Diners = 3[0,6,8] - XXXX - XXXX - XXXX
 *   Any Bankcard = 5610 - XXXX - XXXX - XXXX
 *   JCB =  [3088|3096|3112|3158|3337|3528] - XXXX - XXXX - XXXX
 *   Enroute = [2014|2149] - XXXX - XXXX - XXX
 *   Switch = [4903|4911|4936|5641|6333|6759|6334|6767] - XXXX - XXXX - XXXX
 */


