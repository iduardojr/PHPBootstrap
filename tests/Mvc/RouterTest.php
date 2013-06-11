<?php
use PHPBootstrap\Mvc\Routing\Router;
use PHPBootstrap\Mvc\Http\HttpRequest;
use PHPBootstrap\Widget\Action\Action;
require_once 'tests/autoload.php';
require_once 'default.php';
require_once 'PHPUnit/Framework/TestCase.php';
/**
 * Router test case.
 */
class RouterTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Router
	 */
	private $router;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp();
		$this->router = new Router('/', array(), array('__NAMESPACE__' => 'Application\\Controllers'));
		$this->router->addRoute(new Router('admin[/:controller[/:action][/:id]]', array('id' => '[0-9]+'), array('__NAMESPACE__' => 'Admin\\Controllers')));
		$this->router->addRoute(new Router(':controller[/:action][/:id]', array('id' => '[0-9]+')));
	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->router = null;
		parent::tearDown();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct( $name = null, array $data = array(), $dataName = '' ) {
		parent::__construct($name, $data, $dataName);
	}

	/**
	 * Tests Router->match()
	 * @dataProvider providerMatch
	 */
	public function testMatch($uri, $controller, $action, $params) {
		$request = new HttpRequest();
		$request->setUri($uri);
		$dispatcher = $this->router->match($request);
		if ( $dispatcher === null ) {
			$this->assertNull($controller);
		} else {
			$this->assertEquals($controller, get_class($dispatcher->getController()));
			$this->assertEquals($action, $dispatcher->getAction());
			$this->assertAttributeEquals($params, 'params', $dispatcher);
		}
	}
	
	public function providerMatch() {
		$provider[] = array('/', 'Application\\Controllers\\IndexController', 'indexAction', array());
		$provider[] = array('/about', 'Application\\Controllers\\AboutController', 'indexAction', array());
		$provider[] = array('/about/', 'Application\\Controllers\\AboutController', 'indexAction', array());
		$provider[] = array('/about/9', 'Application\\Controllers\\AboutController', 'indexAction', array('id' => 9));
		$provider[] = array('/about/show/9', 'Application\\Controllers\\AboutController', 'showAction', array('id' => 9));
		$provider[] = array('/about/show', 'Application\\Controllers\\AboutController', 'showAction', array());
		$provider[] = array('/admin', 'Admin\\Controllers\\IndexController', 'indexAction', array());
		$provider[] = array('/admin/about', 'Admin\\Controllers\\AboutController', 'indexAction', array());
		$provider[] = array('/admin/about/', 'Admin\\Controllers\\AboutController', 'indexAction', array());
		$provider[] = array('/admin/about/9', 'Admin\\Controllers\\AboutController', 'indexAction', array('id' => 9));
		$provider[] = array('/admin/about/show/9', 'Admin\\Controllers\\AboutController', 'showAction', array('id' => 9));
		$provider[] = array('/admin/about/show', 'Admin\\Controllers\\AboutController', 'showAction', array());
		
		$provider[] = array('/source', null, null, array());
		$provider[] = array('/about/show/9/11', null, null, array());
		return $provider;
	}

	/**
	 * Tests Router->toURI()
	 */
	public function testToURI() {
		$this->assertEquals('/admin/about/show/9', $this->router->toURI(new Action('Admin\Controllers\AboutController', 'show', array('id' => 9))));
		$this->assertEquals('/admin/about?query=teste', $this->router->toURI(new Action('Admin\Controllers\AboutController', null, array('query' => 'teste'))));
		$this->assertEquals('/admin/about/9', $this->router->toURI(new Action('Admin\Controllers\AboutController', null, array('id' => 9))));
		$this->assertEquals('/admin/config', $this->router->toURI(new Action('Admin\Controllers\ConfigController', null, array())));
		
	}

}
?>