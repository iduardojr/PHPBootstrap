<?php
use PHPBootstrap\Widget\Form\Controls\Label;
use PHPBootstrap\Render\Html5\Form\Controls\RendererOutputLabel;

require_once 'tests\RendererTest.php';

/**
 * RendererOutputLabel test case.
 */
class RendererOutputLabelTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Label('Name');
		$provider[] = array( $w, '<label>Name</label>' );
		
		$w = new Label('Name');
		$w->setName('l-name');
		$provider[] = array( $w, '<label id="l-name">Name</label>' );
		
		$w = new Label('Name');
		$w->setTarget(new MockEntry());
		$provider[] = array( $w, '<label for="entry">Name</label>' );
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererOutputLabel();
	}

}
?>