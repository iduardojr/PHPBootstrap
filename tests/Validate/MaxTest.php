<?php
use PHPBootstrap\Format\DateFormat;

use PHPBootstrap\Validate\Measure\Ruler\RulerUpload;
use PHPBootstrap\Validate\Measure\Ruler\RulerDate;
use PHPBootstrap\Validate\Measure\Ruler\RulerWords;
use PHPBootstrap\Validate\Measure\Ruler\RulerLength;
use PHPBootstrap\Validate\Measure\Max;

require_once 'tests\ValidateTest.php';

/**
 * Max test case.
 */
class MaxTest extends ValidateTest {

	/**
	 *
	 * @see ValidateTest::provider()
	 */
	public function provider() {
		$w = new Max(3);
		$provider[] = array($w, 2, true);
		$provider[] = array($w, 3, true);
		$provider[] = array($w, 4, false);
	
		$w = new Max(3);
		$w->setRuler(RulerLength::getInstance());
		$provider[] = array($w, '12', true);
		$provider[] = array($w, '123', true);
		$provider[] = array($w, '1234', false);
		
		$provider[] = array($w, array(1,2), true);
		$provider[] = array($w, array(1,2,3), true);
		$provider[] = array($w, array(1,2,3,4), false);
		
		$w = new Max(30000);
		$w->setRuler(RulerUpload::getInstance());
		$provider[] = array($w, array('error' => 0, 'size' => 29000), true);
		$provider[] = array($w, array('error' => 0, 'size' => 30000), true);
		$provider[] = array($w, array('error' => 0, 'size' => 30001), false);
	
		$w = new Max(3);
		$w->setRuler(RulerWords::getInstance());
		$provider[] = array($w, '<b>hours minutes</b>', true);
		$provider[] = array($w, '<b>hours and minutes</b>', true);
		$provider[] = array($w, '<b>hours, minutes and seconds</b>', false);
	
		$format = new DateFormat('dd/mm/yyyy');
		$w = new Max($format->format('now'));
		$w->setRuler(new RulerDate($format));
		$provider[] = array($w, $format->format('-1 day'), true);
		$provider[] = array($w, $format->format('now'), true);
		$provider[] = array($w, $format->format('+1 day'), false);
	
		return $provider;
	}

}
?>