<?php
use PHPBootstrap\Render\Html5\Form\Controls\RendererOutputUneditable;
use PHPBootstrap\Widget\Form\Controls\Uneditable;

require_once 'tests\RendererTest.php';

/**
 * RendererOutputUneditable test case.
 */
class RendererOutputUneditableTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Uneditable('out');
		$provider[] = array($w, '<div id="out" class="uneditable-input"></div>');
		
		$w = new Uneditable('out');
		$w->setValue('Iduardo Junior');
		$provider[] = array($w, '<div id="out" class="uneditable-input">Iduardo Junior</div>');
		
		$w = new Uneditable('out');
		$w->setValue('Iduardo Junior');
		$w->setTransform('strtolower');
		$provider[] = array($w, '<div id="out" class="uneditable-input">iduardo junior</div>');
		
		$w = new Uneditable('out');
		$w->setSpan(3);
		$provider[] = array($w, '<div id="out" class="uneditable-input span3"></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererOutputUneditable();
	}

}
?>