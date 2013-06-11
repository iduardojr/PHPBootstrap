<?php

use PHPBootstrap\Widget\Misc\Paragraph;

use PHPBootstrap\Render\Html5\Layout\RendererContainer;

use PHPBootstrap\Widget\Layout\Container;

require_once 'tests\RendererTest.php';

/**
 * RendererContainer test case.
 */
class RendererContainerTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Container('box');
		$provider[] = array($w, '<div id="box" class="container"></div>');
		
		$w = new Container('box');
		$w->setFluid(true);
		$provider[] = array($w, '<div id="box" class="container-fluid"></div>');
		
		$w = new Container('box');
		$w->append(new Paragraph('teste'));
		$provider[] = array($w, '<div id="box" class="container"><p>teste</p></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererContainer();
	}

}
?>