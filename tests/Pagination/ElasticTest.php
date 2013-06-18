<?php
use PHPBootstrap\Widget\Pagination\Paginator;
use PHPBootstrap\Widget\Pagination\Scrolling\Elastic;

require_once 'SlidingTest.php';
/**
 * Elastic test case.
 */
class ElasticTest extends SlidingTest {
	
	/**
	 * Tests Elastic->getPages()
	 * @dataProvider provider
	 */
	public function testGetPages( $page, $lower, $upper, $range ) {
		$paginator = new Paginator(10, 1, $page);
		$scroll = new Elastic($range);
	
		$this->assertEquals(array($lower, $upper), $scroll->getPages($paginator));
	}
	
	public function provider() {
		$provider[] = array(1, 1, 1, 1);
		$provider[] = array(2, 2, 2, 1);
		$provider[] = array(3, 3, 3, 1);
		$provider[] = array(4, 4, 4, 1);
		$provider[] = array(9, 9, 9, 1);
		$provider[] = array(10, 10, 10, 1);
	
		$provider[] = array(1, 1, 3, 2);
		$provider[] = array(2, 1, 3, 2);
		$provider[] = array(3, 2, 4, 2);
		$provider[] = array(4, 3, 5, 2);
		$provider[] = array(9, 8, 10, 2);
		$provider[] = array(10, 8, 10, 2);
	
		$provider[] = array(1, 1, 5, 3);
		$provider[] = array(2, 1, 5, 3);
		$provider[] = array(3, 1, 5, 3);
		$provider[] = array(4, 2, 6, 3);
		$provider[] = array(8, 6, 10, 3);
		$provider[] = array(9, 6, 10, 3);
		$provider[] = array(10, 6, 10, 3);
	
		$provider[] = array(1, 1, 7, 4);
		$provider[] = array(2, 1, 7, 4);
		$provider[] = array(3, 1, 7, 4);
		$provider[] = array(4, 1, 7, 4);
		$provider[] = array(5, 2, 8, 4);
		$provider[] = array(6, 3, 9, 4);
		$provider[] = array(7, 4, 10, 4);
		$provider[] = array(8, 4, 10, 4);
		$provider[] = array(9, 4, 10, 4);
		$provider[] = array(10, 4, 10, 4);
	
		$provider[] = array(1, 1, 9, 5);
		$provider[] = array(2, 1, 9, 5);
		$provider[] = array(5, 1, 9, 5);
		$provider[] = array(6, 2, 10, 5);
	
		$provider[] = array(1, 1, 10, 10);
		$provider[] = array(2, 1, 10, 10);
		$provider[] = array(10, 1, 10, 10);
	
		return $provider;
	}
}
?>