<?php
use PHPBootstrap\Widget\Misc\Paragraph;
use PHPBootstrap\Widget\Misc\Well;
use PHPBootstrap\Render\Html5\Misc\RendererWell;

require_once 'tests\RendererTest.php';

/**
 * RendererWell test case.
 */
class RendererWellTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Well('w');
		$provider[] = array($w, '<div id="w" class="well"></div>');
		
		$w = new Well('w');
		$w->setSize(Well::Small);
		$provider[] = array($w, '<div id="w" class="well well-small"></div>');
		
		$w = new Well('w');
		$w->append(new Paragraph('teste'));
		$provider[] = array($w, '<div id="w" class="well"><p>teste</p></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererWell();
	}

}
?>