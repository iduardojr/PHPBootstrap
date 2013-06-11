<?php
use PHPBootstrap\Mvc\Http\HttpRequest;
require 'tests/autoload.php';
require_once 'PHPUnit/Framework/TestCase.php';
/**
 * HttpRequest test case.
 */
class HttpRequestTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var HttpRequest
	 */
	private $request;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp();
		$this->request = new HttpRequest();
	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->request = null;
		parent::tearDown();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
	}


	/**
	 * Tests HttpRequest->getUri()
	 */
	public function testGetUri() {
		$this->assertEquals($_SERVER['REQUEST_URI'], $this->request->getUri());
	}
	
	/**
	 * Tests HttpRequest->getMethod()
	 */
	public function testGetMethod() {
		$this->assertEquals($_SERVER['REQUEST_METHOD'], $this->request->getMethod());
	}

	/**
	 * Tests HttpRequest->getRequestLine()
	 */
	public function testGetRequestLine() {
		$requestLine = $_SERVER['REQUEST_METHOD'] . ' ' . $_SERVER['REQUEST_URI'] . ' ' . $_SERVER['SERVER_PROTOCOL'];
		$this->assertEquals($requestLine, $this->request->getRequestLine());
	}

	/**
	 * Tests HttpRequest->getQuery()
	 */
	public function testGetQuery() {
		$this->assertEquals($_GET, $this->request->getQuery());
	}

	/**
	 * Tests HttpRequest->getPost()
	 */
	public function testGetPost() {
		$this->assertEquals(array_merge($_POST, $_FILES), $this->request->getPost());
	}

	/**
	 * Tests HttpRequest->getCookie()
	 */
	public function testGetCookie() {
		$this->assertEquals($_COOKIE, $this->request->getCookie());
	}

	/**
	 * Tests HttpRequest->getData()
	 */
	public function testGetData() {
		$this->assertEquals($_GET, $this->request->getData());
	}

	/**
	 * Tests HttpRequest->getRequest()
	 */
	public function testGetRequest() {
		$this->assertEquals(array_merge($_REQUEST, $_COOKIE), $this->request->getRequest());
	}

	/**
	 * Tests HttpRequest->isXmlHttpRequest()
	 */
	public function testIsXmlHttpRequest() {
		$this->assertFalse($this->request->isXmlHttpRequest());
	}

	/**
	 * Tests HttpRequest->isFlashRequest()
	 */
	public function testIsFlashRequest() {
		$this->assertFalse($this->request->isFlashRequest());
	}
}
?>