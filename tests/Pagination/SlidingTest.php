<?php
use PHPBootstrap\Widget\Pagination\Scrolling\Sliding;
use PHPBootstrap\Widget\Pagination\Paginator;
require_once 'tests/autoload.php';
/**
 * Sliding test case.
 */
class SlidingTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests Sliding->getPages()
	 * @dataProvider provider
	 */
	public function testGetPages( $page, $lower, $upper, $range ) {
		$paginator = new Paginator(10, 1, $page);
		$scroll = new Sliding($range);
	
		$this->assertEquals(array($lower, $upper), $scroll->getPages($paginator));
	}
	
	public function provider() {
		$provider[] = array(1, 1, 1, 1);
		$provider[] = array(2, 2, 2, 1);
		$provider[] = array(3, 3, 3, 1);
		$provider[] = array(4, 4, 4, 1);
		$provider[] = array(9, 9, 9, 1);
		$provider[] = array(10, 10, 10, 1);
	
		$provider[] = array(1, 1, 2, 2);
		$provider[] = array(2, 2, 3, 2);
		$provider[] = array(3, 3, 4, 2);
		$provider[] = array(4, 4, 5, 2);
		$provider[] = array(9, 9, 10, 2);
		$provider[] = array(10, 9, 10, 2);
	
		$provider[] = array(1, 1, 3, 3);
		$provider[] = array(2, 1, 3, 3);
		$provider[] = array(3, 2, 4, 3);
		$provider[] = array(4, 3, 5, 3);
		$provider[] = array(8, 7, 9, 3);
		$provider[] = array(9, 8, 10, 3);
		$provider[] = array(10, 8, 10, 3);
	
		$provider[] = array(1, 1, 4, 4);
		$provider[] = array(2, 1, 4, 4);
		$provider[] = array(3, 2, 5, 4);
		$provider[] = array(4, 3, 6, 4);
		$provider[] = array(5, 4, 7, 4);
		$provider[] = array(6, 5, 8, 4);
		$provider[] = array(7, 6, 9, 4);
		$provider[] = array(8, 7, 10, 4);
		$provider[] = array(9, 7, 10, 4);
		$provider[] = array(10, 7, 10, 4);
	
		$provider[] = array(1, 1, 5, 5);
		$provider[] = array(2, 1, 5, 5);
		$provider[] = array(3, 1, 5, 5);
		$provider[] = array(4, 2, 6, 5);
		$provider[] = array(5, 3, 7, 5);
		$provider[] = array(6, 4, 8, 5);
		$provider[] = array(7, 5, 9, 5);
		$provider[] = array(8, 6, 10, 5);
		$provider[] = array(9, 6, 10, 5);
		$provider[] = array(10, 6, 10, 5);
	
		$provider[] = array(1, 1, 6, 6);
		$provider[] = array(2, 1, 6, 6);
		$provider[] = array(3, 1, 6, 6);
		$provider[] = array(4, 2, 7, 6);
		$provider[] = array(5, 3, 8, 6);
		$provider[] = array(6, 4, 9, 6);
		$provider[] = array(7, 5, 10, 6);
		$provider[] = array(8, 5, 10, 6);
		$provider[] = array(9, 5, 10, 6);
		$provider[] = array(10, 5, 10, 6);
	
		$provider[] = array(1, 1, 10, 10);
		$provider[] = array(2, 1, 10, 10);
		$provider[] = array(10, 1, 10, 10);
	
		return $provider;
	}
}
?>