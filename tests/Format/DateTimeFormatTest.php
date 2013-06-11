<?php
use PHPBootstrap\Format\DateTimeFormat;

require 'tests/autoload.php';

/**
 * DateTimeFormat test case.
 */
class DateTimeFormatTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 * @var DateTimeFormat
	 */
	private $object;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		$this->object = new DateTimeFormat('dd/mm/yyyy hh:mm:ss');
	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->object = null;
	}

	/**
	 * Tests DateTimeFormat->__construct()
	 * @dataProvider construct
	 */
	public function test__construct($pattern, $exception) {
		if ( $exception ) {
			$this->setExpectedException('InvalidArgumentException');
		}
		$this->object->__construct($pattern);
	}
	
	public function construct() {
		return array(array('dd/mm/yyyy', true),
					 array('HH:mm:ss', true),
					 array('dd mm yyyy hh:mm:ss', true),
					 array('dd/mm/yyyy hh:mm:ss', false),
					 array('yyyy.mm.dd HH:mm:ss', false),
					 array('yyyy-mm-dd HH:mm:ss', false));
	}
	
	/**
	 * Tests DateTimeFormat->format()
	 * @dataProvider format
	 */
	public function testFormat( $pattern, $date ) {
		$this->object->__construct($pattern);
		$this->assertEquals(date($date), $this->object->format('now'));
	}
	
	public function format() {
		return array(array('dd/mm/yyyy hh:mm:ss', 'd/m/Y h:i:s A'),
					 array('dd/mm/yyyy HH:mm:ss', 'd/m/Y H:i:s'),
					 array('dd/mm/yyyy hh:mm', 'd/m/Y h:i A'),
					 array('dd/mm/yyyy HH:mm', 'd/m/Y H:i'));
	}

	/**
	 * Tests DateTimeFormat->parse()
	 * @dataProvider parse
	 */
	public function testParse($pattern, $value, $expected) {
		if ( $expected === null ) {
			$this->setExpectedException('InvalidArgumentException');
		}
		$this->object->__construct($pattern);
		$this->assertEquals($expected, $this->object->parse($value));
	}
	
	public function parse() {
		$patterns[] = 'dd/mm/yyyy hh:mm:ss';
		$patterns[] = 'dd/mm/yyyy HH:mm';
		$patterns[] = 'yyyy-mm-dd HH:mm:ss';
		$patterns[] = 'mm-yyyy-dd hh:mm';
		
		$dates[] = '2013-01-31';
		$dates[] = '2013-02-28';
		$dates[] = '2013-03-31';
		$dates[] = '2013-04-30';
		$dates[] = '2013-05-31';
		$dates[] = '2013-06-30';
		$dates[] = '2013-07-31';
		$dates[] = '2013-08-31';
		$dates[] = '2013-09-30';
		$dates[] = '2013-10-31';
		$dates[] = '2013-11-30';
		$dates[] = '2013-12-31';
		$dates[] = '2013-01-29';
		$dates[] = '2016-02-29';
		
		$times[] = '00:00:00';
		$times[] = '12:00:00';
		$times[] = '12:59:00';
		$times[] = '23:59:00';
		
		foreach( $patterns as $pattern ) {
			$obj = new DateTimeFormat($pattern);
			foreach( $dates as $date ) {
				foreach( $times as $time ) {
					$provider[] = array($pattern, $obj->format($date . ' ' . $time), $date . ' ' . $time);
				}
			}
		}
		$provider[] = array('dd/mm/yyyy HH:mm', '28/02/2013 00:00:00', null);
		$provider[] = array('dd/mm/yyyy HH:mm', '31/04/2013', null);
		$provider[] = array('dd/mm/yyyy hh:mm', '01/01/2013 00:00', null);
		$provider[] = array('dd/mm/yyyy hh:mm', '01/01/2013 13:00 pm', null);
		$provider[] = array('dd/mm/yyyy hh:mm', '01/01/2013 00:60 am', null);
		$provider[] = array('dd/mm/yyyy hh:mm', '01/01/2013 12:60 pm', null);
		$provider[] = array('dd/mm/yyyy hh:mm', '01/01/2013 13:00 pm', null);
		$provider[] = array('dd/mm/yyyy hh:mm:ss', '01/01/2013 01:00:79 pm', null);
		$provider[] = array('dd/mm/yyyy hh:mm:ss', '01/01/2013 01:00 tm', null);
		return $provider;
	}

	/**
	 * Tests DateTimeFormat->regex()
	 * @dataProvider regex
	 */
	public function testRegex( $pattern, $value, $expected ) {
		$this->object->__construct($pattern);
		$this->assertEquals($expected, preg_match($this->object->regex(), $value) > 0);
	}
	
	public function regex() {
		$patterns[] = 'dd/mm/yyyy hh:mm:ss';
		$patterns[] = 'dd/mm/yyyy HH:mm';
		$patterns[] = 'yyyy-mm-dd HH:mm:ss';
		$patterns[] = 'mm-yyyy-dd hh:mm';
		
		$dates[] = '2013-01-31'; 
		$dates[] = '2013-02-28'; 
		$dates[] = '2013-03-31'; 
		$dates[] = '2013-04-30';
		$dates[] = '2013-05-31';
		$dates[] = '2013-06-30';
		$dates[] = '2013-07-31';
		$dates[] = '2013-08-31';
		$dates[] = '2013-09-30';
		$dates[] = '2013-10-31';
		$dates[] = '2013-11-30';
		$dates[] = '2013-12-31';
		$dates[] = '2013-01-29';
		$dates[] = '2016-02-29';
		
		$times[] = '00:00:00';
		$times[] = '12:00:00';
		$times[] = '12:59:59';
		$times[] = '23:59:59';
		
		foreach( $patterns as $pattern ) {
			$obj = new DateTimeFormat($pattern);
			foreach( $dates as $date ) {
			 	foreach( $times as $time ) {
			 		$provider[] = array($pattern, $obj->format($date . ' ' . $time), true);
			 	}			
			}
		}
		$provider[] = array('dd/mm/yyyy HH:mm', '29/02/2013 00:00', false);
		$provider[] = array('dd/mm/yyyy HH:mm', '31/04/2013 00:00', false);
		$provider[] = array('dd/mm/yyyy HH:mm', '31/06/2013 00:00', false);
		$provider[] = array('dd/mm/yyyy HH:mm', '31/09/2013 00:00', false);
		$provider[] = array('dd/mm/yyyy HH:mm', '31/11/2013 00:00', false);
		$provider[] = array('dd/mm/yyyy HH:mm', '01/01/2013 24:00', false);
		$provider[] = array('dd/mm/yyyy HH:mm', '01/01/2013 21:60', false);
		$provider[] = array('dd/mm/yyyy hh:mm', '01/01/2013 00:00', false);
		$provider[] = array('dd/mm/yyyy hh:mm', '01/01/2013 01:60 am', false);
		$provider[] = array('dd/mm/yyyy hh:mm', '01/01/2013 12:60 pm', false);
		$provider[] = array('dd/mm/yyyy hh:mm', '01/01/2013 13:00 pm', false);
		$provider[] = array('dd/mm/yyyy hh:mm:ss', '01/01/2013 01:00:79 pm', false);
		$provider[] = array('dd/mm/yyyy hh:mm:ss', '01/01/2013 01:00 tm', false);
		return $provider;
	}

}
?>