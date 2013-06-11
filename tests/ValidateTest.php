<?php
use PHPBootstrap\Validate\Validate;

require 'autoload.php';

/**
 * Validate test case.
 */
abstract class ValidateTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests Validate->valid()
	 * @dataProvider provider
	 */
	public function testValid( Validate $obj, $value, $expected ) {
		$this->assertEquals($expected, $obj->valid($value));
	}
	
	/**
	 * Data provider
	 */
	abstract public function provider();

}
?>