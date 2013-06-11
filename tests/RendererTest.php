<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\QueryString;
use PHPBootstrap\Render\RenderKit;
use PHPBootstrap\Render\Renderer;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Render;

require 'autoload.php';

Action::setRouter(new QueryString());

/**
 * Renderizador abstracto.
 */
abstract class RendererTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 * @var Renderer
	 */
	protected $renderer;

	/**
	 * Constructs the test case.
	 */
	public function __construct( $name = null, array $data = array(), $dataName = '' ) {
		parent::__construct($name, $data, $dataName);
		$this->renderer = $this->create();
		$this->renderer->setRenderKit(RenderKit::getInstance());
	}

	/**
	 * Tests Renderer->render() 
	 * @dataProvider provider
	 */
	public function testRender( Render $ui, $html, Context $context = null ) {
		if ( empty($context) ) {
			$context = new Context();
		}
		$this->renderer->render($ui, $context);
		
		$this->assertEquals('PHPBootstrap\Render\Html5\HtmlNode', get_class($context->getResponse()));
		$this->assertEquals($html, (string) $context->getResponse() );
	}
	
	/**
	 * Data provider
	 */
	abstract public function provider();

	/**
	 * Cria objeto
	 *
	 * @return Renderer
	 */
	abstract public function create();

}