<?php
use PHPBootstrap\Mvc\Session\Session;
require_once 'src/PHPBootstrap/Mvc/Session/Session.php';
require_once 'PHPUnit/Framework/TestCase.php';
/**
 * Session test case.
 */
class SessionTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Session
	 */
	private $session;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp();
		$this->session = new Session('authenticate');
	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->session = null;
		parent::tearDown();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
	}

	/**
	 * Tests Session->__set()
	 */
	public function test__set() {
		$this->session->name = 'Iduardo Junior';
		$this->session->email = 'iduardo@php.com.br';
		$this->assertEquals(array('authenticate' => array('name' => 'Iduardo Junior', 'email' => 'iduardo@php.com.br')), $_SESSION);
	}

	/**
	 * Tests Session->__get()
	 */
	public function test__get() {
		$this->session->name = 'Iduardo Junior';
		$this->session->email = 'iduardo@php.com.br';
		$this->assertEquals('Iduardo Junior', $this->session->name);
		$this->assertEquals('iduardo@php.com.br', $this->session->email);
	}

	/**
	 * Tests Session::start()
	 */
	public function testStart() {
		Session::start();
		if ( ! isset($_COOKIE['PHPSESSID']) ) {
			foreach( headers_list() as $header ) {
				if ( preg_match('/^Set-Cookie: PHPSESSID=/', $header) ) {
					return;
				}
			}
			$this->fail('fail');
		}
	}

	/**
	 * Tests Session::restart()
	 */
	public function testRestart() {
		Session::restart();
		foreach( headers_list() as $header ) {
			if ( preg_match('/^Set-Cookie: PHPSESSID=/', $header) ) {
				return;
			}
		}
		$this->fail('fail');
	}

	/**
	 * Tests Session::close()
	 */
	public function testClose() {
		$this->setExpectedException('RuntimeException');
		Session::close();
		$this->session->name = null;
	}

	/**
	 * Tests Session::unregister()
	 */
	public function testUnregister() {
		Session::unregister($this->session);
		$this->assertEquals(array(), $_SESSION);
	}
}

