<?php

namespace CreditCardTest;

use CreditCard\CreditCard;

class CreditCardTest extends \PHPUnit\Framework\TestCase
{
	
	private $creditCard;
	
	public function setUp()
	{
		$this->creditCard = new CreditCard();
	}
	
	function testCheckLength()
	{
		$this->assertEquals(16,$this->creditCard->checkLength(2,16));
	}
	
	function testValidNumber()
	{
		$this->assertTrue($this->creditCard->setCardNumber('44442222666633'));
	}
	
	function testInvalidNumberShouldReturnError()
	{
	
		$this->assertEquals( 'ERROR_INVALID_LENGTH', $this->creditCard->setCardNumber('3333555522222312312') );
	}
	
	function testValidNumberShouldSetAndGet()
	{
		$this->creditCard->setCardNumber('44443333222211');
		$this->assertEquals('44443333222211',$this->creditCard->getCardNumber());
	}
	
	
	
}
