<?php
use PHPBootstrap\Render\Html5\Misc\RendererLabel;
use PHPBootstrap\Widget\Misc\Label;

require_once 'tests\RendererTest.php';

/**
 * RendererTag test case.
 */
class RendererLabelTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Label('17');
		$provider[] = array($w, '<span class="label">17</span>');
		
		$w = new Label('17');
		$w->setName('tag');
		$provider[] = array($w, '<span id="tag" class="label">17</span>');
		
		$w = new Label('17');
		$w->setStyle(Label::Important);
		$provider[] = array($w, '<span class="label label-important">17</span>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererLabel();
	}

}
?>