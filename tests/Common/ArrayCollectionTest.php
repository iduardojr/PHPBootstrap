<?php
use PHPBootstrap\Common\ArrayCollection;

require_once 'src\PHPBootstrap\Common\Collection.php';
require_once 'src\PHPBootstrap\Common\ListCollection.php';
require_once 'src\PHPBootstrap\Common\MapCollection.php';
require_once 'src\PHPBootstrap\Common\StackCollection.php';
require_once 'src\PHPBootstrap\Common\ArrayCollection.php';
require_once 'src\PHPBootstrap\Common\ArrayIterator.php';

/**
 * ArrayCollection test case.
 */
class ArrayCollectionTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 * @var ArrayCollection
	 */
	private $collection;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp();
		$this->collection = new ArrayCollection(array(1,2,3,5,6));
	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->collection = null;
		parent::tearDown();
	}

	/**
	 * Tests ArrayCollection->add()
	 */
	public function testAdd() {
		$this->collection->add(7);
		$this->assertEquals(array(1,2,3,5,6,7), $this->collection->toArray());
	}

	/**
	 * Tests ArrayCollection->contains()
	 */
	public function testContains() {
		$this->assertTrue($this->collection->contains(3));
		$this->assertFalse($this->collection->contains(4));
	}

	/**
	 * Tests ArrayCollection->remove()
	 */
	public function testRemove() {
		$this->collection->remove(3);
		$this->assertEquals(array(0 => 1, 1 => 2, 3 => 5, 4 => 6), $this->collection->toArray());
	}

	/**
	 * Tests ArrayCollection->getFirst()
	 */
	public function testGetFirst() {
		$this->assertEquals(1, $this->collection->getFirst());
	}

	/**
	 * Tests ArrayCollection->getLast()
	 */
	public function testGetLast() {
		$this->assertEquals(6, $this->collection->getLast());
	}

	/**
	 * Tests ArrayCollection->isEmpty()
	 * Tests ArrayCollection->clear()
	 */
	public function testIsEmpty() {
		$this->assertFalse($this->collection->isEmpty());
		$this->collection->clear();
		$this->assertTrue($this->collection->isEmpty());
	}

	/**
	 * Tests ArrayCollection->indexOf()
	 */
	public function testIndexOf() {
		$this->assertEquals(2, $this->collection->indexOf(3));
		$this->assertEquals(null, $this->collection->indexOf(4));
	}

	/**
	 * Tests ArrayCollection->get()
	 */
	public function testGet() {
		$this->assertEquals(2, $this->collection->get(1));
		$this->assertEquals(null, $this->collection->get(10));
	}

	/**
	 * Tests ArrayCollection->reverse()
	 */
	public function testReverse() {
		$this->collection->reverse();
		$this->assertEquals(array(4 => 6, 3 => 5, 2 => 3, 1 => 2, 0 => 1), $this->collection->toArray());
	}

	/**
	 * Tests ArrayCollection->toArray()
	 */
	public function testToArray() {
		$this->assertEquals(array(1,2,3,5,6), $this->collection->toArray());
	}

	/**
	 * Tests ArrayCollection->getIterator()
	 */
	public function testGetIterator() {
		$iterator = $this->collection->getIterator();
		$this->assertEquals('PHPBootstrap\Common\ArrayIterator', get_class($iterator));
		$elements = array();
		foreach( $iterator as $key => $current ) {
			$elements[$key] = $current;
		}
		$this->assertEquals(array(1,2,3,5,6), $elements);
	}

	/**
	 * Tests ArrayCollection->count()
	 */
	public function testCount() {
		$this->assertEquals(5, $this->collection->count());
	}

	/**
	 * Tests ArrayCollection->set()
	 */
	public function testSet() {
		$this->collection->set(6, 7);
		$this->assertEquals(array(1,2,3,5,6, 6 => 7), $this->collection->toArray());
		$this->collection->set(0, null);
		$this->assertEquals(array(1=>2, 2 => 3, 3 => 5, 4 => 6, 6 => 7), $this->collection->toArray());
	}

	/**
	 * Tests ArrayCollection->containsKey()
	 */
	public function testContainsKey() {
		$this->assertTrue($this->collection->containsKey(1));
		$this->assertFalse($this->collection->containsKey(6));
	}

	/**
	 * Tests ArrayCollection->removeKey()
	 */
	public function testRemoveKey() {
		$this->assertEquals(1, $this->collection->removeKey(0));
		$this->assertEquals(null, $this->collection->removeKey(0));
		$this->assertEquals(array(1=>2, 2 => 3, 3 => 5, 4 => 6), $this->collection->toArray());
	}

	/**
	 * Tests ArrayCollection->getKeys()
	 */
	public function testGetKeys() {
		$iterator = $this->collection->getKeys();
		$this->assertEquals('PHPBootstrap\Common\ArrayIterator', get_class($iterator));
		$this->assertAttributeEquals(array(0,1,2,3,4), 'elements', $iterator);
	}

	/**
	 * Tests ArrayCollection->getElements()
	 */
	public function testGetElements() {
		$iterator = $this->collection->getElements();
		$this->assertEquals('PHPBootstrap\Common\ArrayIterator', get_class($iterator));
		$this->assertAttributeEquals(array(1,2,3,5,6), 'elements', $iterator);
	}

	/**
	 * Tests ArrayCollection->getFirstKey()
	 */
	public function testGetFirstKey() {
		$this->assertEquals(0, $this->collection->getFirstKey());
	}

	/**
	 * Tests ArrayCollection->getLastKey()
	 */
	public function testGetLastKey() {
		$this->assertEquals(4, $this->collection->getLastKey());
	}

	/**
	 * Tests ArrayCollection->append()
	 */
	public function testAppend() {
		$this->collection->append(7);
		$this->assertEquals(array(1,2,3,5,6,7), $this->collection->toArray());
	}

	/**
	 * Tests ArrayCollection->prepend()
	 */
	public function testPrepend() {
		$this->collection->prepend(0);
		$this->assertEquals(array(0,1,2,3,5,6), $this->collection->toArray());
	}

	/**
	 * Tests ArrayCollection->replace()
	 */
	public function testReplace() {
		$this->collection->replace(3, 4);
		$this->assertEquals(array(1,2,4,5,6), $this->collection->toArray());
	}

	/**
	 * Tests ArrayCollection->after()
	 */
	public function testAfter() {
		$this->collection->after(2, 4);
		$this->assertEquals(array(1,2,3,4,5,6), $this->collection->toArray());
		
		$this->collection->after(5, 7,'seven');
		$this->assertEquals(array(1,2,3,4,5,6, 'seven' => 7), $this->collection->toArray());
		
	}

	/**
	 * Tests ArrayCollection->before()
	 */
	public function testBefore() {
		$this->collection->before(3, 4);
		$this->assertEquals(array(1,2,3,4,5,6), $this->collection->toArray());
		$this->collection->before(0, 0,'zero');
		$this->assertEquals(array('zero' => 0,1,2,3,4,5,6), $this->collection->toArray());
	}

	/**
	 * Tests ArrayCollection->pop()
	 */
	public function testPop() {
		$this->assertEquals(6, $this->collection->pop());
		$this->assertEquals(array(1,2,3,5), $this->collection->toArray());
	}

	/**
	 * Tests ArrayCollection->shift()
	 */
	public function testShift() {
		$this->assertEquals(1, $this->collection->shift());
		$this->assertEquals(array(2,3,5,6), $this->collection->toArray());
	}


	/**
	 * Tests ArrayCollection->resetKeys()
	 */
	public function testResetKeys() {
		$this->collection->set(10, 7);
		$this->assertEquals(array(1,2,3,5,6,10=>7), $this->collection->toArray());
		$this->collection->resetKeys();
		$this->assertEquals(array(1,2,3,5,6,7), $this->collection->toArray());
	}

	/**
	 * Tests ArrayCollection->partition()
	 */
	public function testPartition() {
		$p = $this->collection->partition(function($key, $element) {
			return $element < 3;
		});
		$this->assertEquals(2, count($p));
		$this->assertEquals('PHPBootstrap\Common\ArrayCollection', get_class($p[0]));
		$this->assertEquals('PHPBootstrap\Common\ArrayCollection', get_class($p[1]));
		$this->assertAttributeEquals(array(1,2), 'elements', $p[0]);
		$this->assertAttributeEquals(array(2=>3,3=>5,4=>6), 'elements', $p[1]);
	}

}

