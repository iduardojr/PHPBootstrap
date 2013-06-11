<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Misc\Anchor;
use PHPBootstrap\Render\Html5\Misc\RendererAnchor;

require_once 'tests\RendererTest.php';

/**
 * RendererAnchor test case.
 */
class RendererAnchorTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Anchor('teste');
		$provider[] = array($w, '<a href="#">teste</a>');
		
		$w = new Anchor('teste');
		$w->setName('anchor');
		$provider[] = array($w, '<a id="anchor" href="#">teste</a>');
		
		$w = new Anchor('teste');
		$w->setToggle(new TgLink(new Action('Teste')));
		$provider[] = array($w, '<a href="?class=Teste">teste</a>');
		
		$w = new Anchor('teste');
		$w->setTooltip(new Tooltip('title'));
		$provider[] = array($w, '<a href="#" rel="tooltip" title="title">teste</a>');
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererAnchor();
	}

}
?>