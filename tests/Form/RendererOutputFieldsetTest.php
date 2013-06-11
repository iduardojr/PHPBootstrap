<?php
use PHPBootstrap\Widget\Form\Controls\Label;
use PHPBootstrap\Widget\Form\Controls\Fieldset;
use PHPBootstrap\Render\Html5\Form\Controls\RendererOutputFieldset;

require_once 'tests\RendererTest.php';

/**
 * RendererOutputFieldset test case.
 */
class RendererOutputFieldsetTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Fieldset('Legend');
		$provider[] = array($w, '<fieldset><legend>Legend</legend></fieldset>');
		
		$w = new Fieldset('Legend');
		$w->setName('fieldset');
		$provider[] = array($w, '<fieldset id="fieldset"><legend>Legend</legend></fieldset>');
		
		$w = new Fieldset('Legend');
		$w->append(new Label('Label'));
		$provider[] = array($w, '<fieldset><legend>Legend</legend><label>Label</label></fieldset>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererOutputFieldset();
	}

}
?>