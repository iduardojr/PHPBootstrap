<?php
use PHPBootstrap\Mvc\Acl\Acl;
require_once 'src/PHPBootstrap/Mvc/Acl/Acl.php';
require_once 'PHPUnit/Framework/TestCase.php';
/**
 * Acl test case.
 */
class AclTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Acl
	 */
	private $acl;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp();
		$this->acl = new Acl(false);
		$this->acl->allow(array('guest', 'administrator', 'master'));
		$this->acl->deny('guest', 'admin');
		$this->acl->deny('administrator', 'admin', 'configure');
		$this->acl->deny('administrator', 'admin', 'install');
	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->acl = null;
		parent::tearDown();
	}

	/**
	 * Tests Acl->isAllowed()
	 * @dataProvider provider
	 */
	public function testIsAllowed($expected, $role, $resource, $privilege) {
		$this->assertEquals($expected, $this->acl->isAllowed($role, $resource, $privilege));
	}
	
	public function provider() {
		$provider[] = array(false, 'member', 'about', null);
		$provider[] = array(false, 'guest', 'admin', null);
		$provider[] = array(true, 'guest', 'about', 'install');
		$provider[] = array(false, 'guest', 'admin', 'install');
		$provider[] = array(true, 'administrator', 'about', 'install');
		$provider[] = array(false, 'administrator', 'admin', 'install');
		$provider[] = array(true, 'administrator', 'admin', 'features');
		$provider[] = array(true, 'master', 'admin', 'install');
		return $provider;
	}
}
?>