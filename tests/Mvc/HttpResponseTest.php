<?php
use PHPBootstrap\Mvc\Http\HttpResponse;
use PHPBootstrap\Mvc\Http\Cookie;
require_once 'tests/autoload.php';
require_once 'PHPUnit/Framework/TestCase.php';
/**
 * HttpResponse test case.
 */
class HttpResponseTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var HttpResponse
	 */
	private $response;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp();
		$this->response = new HttpResponse();
	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->response = null;
		parent::tearDown();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
	}

	/**
	 * Tests HttpResponse->getStatusCode()
	 */
	public function testGetStatusCode() {
		$this->assertEquals(200, $this->response->getStatusCode());
	}

	/**
	 * Tests HttpResponse->getStatusText()
	 */
	public function testGetStatusText() {
		$this->assertEquals('Ok', $this->response->getStatusText());
	}

	/**
	 * Tests HttpResponse->setCookie()
	 */
	public function testSetCookie() {
		$this->response->setCookie(new Cookie('name', 'Iduardo Junior'));
		$this->assertArrayHasKey('Set-Cookie', $this->response->getHeaders());
	}

	/**
	 * Tests HttpResponse->removeCookie()
	 */
	public function testRemoveCookie() {
		$this->response->setCookie(new Cookie('name', 'Iduardo Junior'));
		$this->response->removeCookie('name');
		$this->assertArrayNotHasKey('Set-Cookie', $this->response->getHeaders());
		
	}

	/**
	 * Tests HttpResponse->redirect()
	 */
	public function testRedirect() {
		$url = 'teste.php';
		$this->response->redirect($url);
		$this->assertEquals(302, $this->response->getStatusCode());
		$this->assertEquals('Found', $this->response->getStatusText());
		$this->assertEquals($url, $this->response->getHeader('Location'));
	}

}
?>