<?php
use PHPBootstrap\Widget\Misc\Paragraph;

use PHPBootstrap\Widget\Layout\Box;

use PHPBootstrap\Render\Html5\Layout\RendererBox;

require_once 'tests\RendererTest.php';

/**
 * RendererBox test case.
 */
class RendererBoxTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Box();
		$provider[] = array($w, '<div></div>');
		
		$w = new Box();
		$w->setName('box');
		$provider[] = array($w, '<div id="box"></div>');
		
		$w = new Box();
		$w->setSpan(10);
		$provider[] = array($w, '<div class="span10"></div>');
		
		$w = new Box();
		$w->setOffset(3);
		$provider[] = array($w, '<div class="offset3"></div>');
		
		$w = new Box();
		$w->append(new Paragraph('teste'));
		$provider[] = array($w, '<div><p>teste</p></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererBox();
	}

}
?>