<?php
use PHPBootstrap\Format\DateFormat;

use PHPBootstrap\Validate\Measure\Ruler\RulerUpload;
use PHPBootstrap\Validate\Measure\Ruler\RulerWords;
use PHPBootstrap\Validate\Measure\Ruler\RulerDate;
use PHPBootstrap\Validate\Measure\Ruler\RulerLength;
use PHPBootstrap\Validate\Measure\Min;

require_once 'tests\ValidateTest.php';

/**
 * Min test case.
 */
class MinTest extends ValidateTest {

	/**
	 *
	 * @see ValidateTest::provider()
	 */
	public function provider() {
		$w = new Min(3);
		$provider[] = array($w, 2, false);
		$provider[] = array($w, 3, true);
		$provider[] = array($w, 4, true);

		$w = new Min(3);
		$w->setRuler(RulerLength::getInstance());
		$provider[] = array($w, '12', false);
		$provider[] = array($w, '123', true);
		$provider[] = array($w, '1234', true);
		
		$provider[] = array($w, array(1,2), false);
		$provider[] = array($w, array(1,2,3), true);
		$provider[] = array($w, array(1,2,3,4), true);
		
		$w = new Min(30000);
		$w->setRuler(RulerUpload::getInstance());
		$provider[] = array($w, array('error' => 0, 'size' => 29000), false);
		$provider[] = array($w, array('error' => 0, 'size' => 30000), true);
		$provider[] = array($w, array('error' => 0, 'size' => 30001), true);
		
		$w = new Min(3);
		$w->setRuler(RulerWords::getInstance());
		$provider[] = array($w, '<b>hours minutes</b>', false);
		$provider[] = array($w, '<b>hours and minutes</b>', true);
		$provider[] = array($w, '<b>hours, minutes and seconds</b>', true);
		
		$format = new DateFormat('dd/mm/yyyy');
		$w = new Min($format->format('now'));
		$w->setRuler(new RulerDate($format));
		$provider[] = array($w, $format->format('-1 day'), false);
		$provider[] = array($w, $format->format('now'), true);
		$provider[] = array($w, $format->format('+1 day'), true);
		
		return $provider;
	}

}
?>