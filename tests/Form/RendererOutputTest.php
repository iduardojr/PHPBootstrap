<?php
use PHPBootstrap\Render\Html5\Form\Controls\RendererOutput;
use PHPBootstrap\Widget\Form\Controls\Output;

require_once 'tests\RendererTest.php';

/**
 * RendererOutput test case.
 */
class RendererOutputTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Output('out');
		$provider[] = array($w, '<div id="out"></div>');
		
		$w = new Output('out');
		$provider[] = array($w, '<div id="out"></div>');
		
		$w = new Output('out');
		$w->setValue('Iduardo Junior');
		$provider[] = array($w, '<div id="out">Iduardo Junior</div>');
		
		$w = new Output('out');
		$w->setValue('Iduardo Junior');
		$w->setTransform('strtolower');
		$provider[] = array($w, '<div id="out">iduardo junior</div>');
		
		$w = new Output('out');
		$w->setSpan(1);
		$provider[] = array($w, '<div id="out" class="span1"></div>');

		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererOutput();
	}

}
?>