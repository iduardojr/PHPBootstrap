<?php
use PHPBootstrap\Render\Html5\Form\Controls\RendererHelp;
use PHPBootstrap\Widget\Form\Controls\Help;

require_once 'tests\RendererTest.php';

/**
 * RendererHelp test case.
 */
class RendererHelpTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Help('Text');
		$provider[] = array($w, '<span class="help-inline">Text</span>');
		
		$w = new Help('Text');
		$w->setName('error');
		$provider[] = array($w, '<span id="error" class="help-inline">Text</span>');
		
		$w = new Help('Text', false);
		$provider[] = array($w, '<span class="help-block">Text</span>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererHelp();
	}
}
?>