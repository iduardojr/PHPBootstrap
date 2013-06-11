<?php
use PHPBootstrap\Validate\Required\Required;

use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\RadioButton;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputRadioButton;

require_once 'tests\RendererTest.php';

/**
 * RendererInputRadioButton test case.
 */
class RendererInputRadioButtonTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new RadioButton('status', 'Status');
		$provider[] = array($w, '<label class="radio"><input type="radio" id="status" name="status" value="1" autocomplete="off" data-control="RadioButton">Status</label>');
		
		$w = new RadioButton('status', 'Status');
		$w->setDisabled(true);
		$provider[] = array($w, '<label class="radio"><input type="radio" id="status" name="status" value="1" disabled="disabled" autocomplete="off" data-control="RadioButton">Status</label>');
		
		$w = new RadioButton('status', 'Status');
		$w->setValue(true);
		$provider[] = array($w, '<label class="radio"><input type="radio" id="status" name="status" value="1" checked="checked" autocomplete="off" data-control="RadioButton">Status</label>');
		
		$w = new RadioButton('status', 'Status');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<label class="radio"><input type="radio" id="status" name="status" value="1" autocomplete="on" data-control="RadioButton">Status</label>');
		
		$w = new RadioButton('status', 'Status');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<label class="radio"><input type="radio" id="status" name="status" value="1" form="form" autocomplete="off" data-control="RadioButton">Status</label>');
		
		$w = new RadioButton('status', 'Status');
		$w->setInline(true);
		$provider[] = array($w, '<label class="radio inline"><input type="radio" id="status" name="status" value="1" autocomplete="off" data-control="RadioButton">Status</label>');
		
		$w = new RadioButton('status', 'Status');
		$w->setRequired(new Required(), 'Requerido');
		$provider[] = array($w, '<label class="radio"><input type="radio" id="status" name="status" value="1" autocomplete="off" data-validate="{&quot;required&quot;:true,&quot;messages&quot;:{&quot;required&quot;:&quot;Requerido&quot;}}" data-control="RadioButton">Status</label>');
		
		$w = new RadioButton('status', 'Status');
		$w->setSpan(3);
		$provider[] = array($w, '<label class="radio span3"><input type="radio" id="status" name="status" value="1" autocomplete="off" data-control="RadioButton">Status</label>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputRadioButton();
	}

}
?>