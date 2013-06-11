<?php
use PHPBootstrap\Format\DateFormat;
use PHPBootstrap\Validate\Length\Counter\UploadLen;
use PHPBootstrap\Validate\Length\Counter\DateLen;
use PHPBootstrap\Validate\Length\Counter\WordsLen;
use PHPBootstrap\Validate\Length\Counter\Length;
use PHPBootstrap\Validate\Length\Range;

require_once 'tests\ValidateTest.php';

/**
 * Range test case.
 */
class RangeTest extends ValidateTest {

	/**
	 *
	 * @see ValidateTest::provider()
	 */
	public function provider() {
		$w = new Range(3,4);
		$provider[] = array($w, 2, false);
		$provider[] = array($w, 3, true);
		$provider[] = array($w, 4, true);
		$provider[] = array($w, 5, false);
	
		$w = new Range(3,4);
		$w->setCounter(Length::getInstance());
		$provider[] = array($w, '12', false);
		$provider[] = array($w, '123', true);
		$provider[] = array($w, '1234', true);
		$provider[] = array($w, '12345', false);
		
		$provider[] = array($w, array(1,2), false);
		$provider[] = array($w, array(1,2,3), true);
		$provider[] = array($w, array(1,2,3,4), true);
		$provider[] = array($w, array(1,2,3,4,5), false);
	
		$w = new Range(30000,31000);
		$w->setCounter(UploadLen::getInstance());
		$provider[] = array($w, array('error' => 0, 'size' => 29000), false);
		$provider[] = array($w, array('error' => 0, 'size' => 30000), true);
		$provider[] = array($w, array('error' => 0, 'size' => 31000), true);
		$provider[] = array($w, array('error' => 0, 'size' => 31001), false);
		
		$w = new Range(3,4);
		$w->setCounter(WordsLen::getInstance());
		$provider[] = array($w, '<b>hours minutes</b>', false);
		$provider[] = array($w, '<b>hours and minutes</b>', true);
		$provider[] = array($w, '<b>hours, minutes and seconds</b>', true);
		$provider[] = array($w, '<b>days, hours, minutes and seconds</b>', false);
	
		$format = new DateFormat('dd/mm/yyyy');
		$w = new Range($format->format('now'), $format->format('+1 day'));
		$w->setCounter(new DateLen($format));
		$provider[] = array($w, $format->format('-1 day'), false);
		$provider[] = array($w, $format->format('now'), true);
		$provider[] = array($w, $format->format('+1 day'), true);
		$provider[] = array($w, $format->format('+2 day'), false);
		return $provider;
	}

}
?>