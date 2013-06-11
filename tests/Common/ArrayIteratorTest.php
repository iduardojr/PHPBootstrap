<?php
use PHPBootstrap\Common\ArrayIterator;

require_once 'src\PHPBootstrap\Common\ArrayIterator.php';
require_once 'PHPUnit\Framework\TestCase.php';

/**
 * ArrayIterator test case.
 */
class ArrayIteratorTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 * @var ArrayIterator
	 */
	private $iterator;
	
	/**
	 * 
	 * @var array
	 */
	private $elements;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp();
		$this->elements = array(1,2,3,4,5);
		$this->iterator = new ArrayIterator($this->elements);
	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->elements = $this->iterator = null;
		parent::tearDown();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {

	}

	public function testIteratorForeach() {
		$elements = array();
		foreach( $this->iterator as $current ) {
			$elements[] = $current;
		}
		$this->assertEquals($this->elements, $elements);
	}
	
	public function testIteratorFor() {
		$elements = array();
		for( $this->iterator->rewind(); $this->iterator->valid(); $this->iterator->next() ) {
			$elements[] = $this->iterator->current();
		}
		$this->assertEquals($this->elements, $elements);
	}
	
	public function testIteratorWhile() {
		$elements = array();
		$this->iterator->rewind();
		while( $this->iterator->valid() ) {
			$elements[] = $this->iterator->current();
			$this->iterator->next();
		}
		$this->assertEquals($this->elements, $elements);
	}

}
?>