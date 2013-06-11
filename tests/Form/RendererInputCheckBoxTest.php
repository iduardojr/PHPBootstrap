<?php
use PHPBootstrap\Validate\Required\Required;

use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\CheckBox;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputCheckBox;

require_once 'tests\RendererTest.php';

/**
 * RendererInputCheckbox test case.
 */
class RendererInputCheckBoxTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new CheckBox('status', 'Status');
		$provider[] = array($w, '<label class="checkbox"><input type="checkbox" id="status" name="status" value="1" autocomplete="off" data-control="CheckBox">Status</label>');
		
		$w = new CheckBox('status', 'Status');
		$w->setDisabled(true);
		$provider[] = array($w, '<label class="checkbox"><input type="checkbox" id="status" name="status" value="1" disabled="disabled" autocomplete="off" data-control="CheckBox">Status</label>');
		
		$w = new CheckBox('status', 'Status');
		$w->setValue(true);
		$provider[] = array($w, '<label class="checkbox"><input type="checkbox" id="status" name="status" value="1" checked="checked" autocomplete="off" data-control="CheckBox">Status</label>');
		
		$w = new CheckBox('status', 'Status');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<label class="checkbox"><input type="checkbox" id="status" name="status" value="1" autocomplete="on" data-control="CheckBox">Status</label>');
		
		$w = new CheckBox('status', 'Status');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<label class="checkbox"><input type="checkbox" id="status" name="status" value="1" form="form" autocomplete="off" data-control="CheckBox">Status</label>');
		
		$w = new CheckBox('status', 'Status');
		$w->setInline(true);
		$provider[] = array($w, '<label class="checkbox inline"><input type="checkbox" id="status" name="status" value="1" autocomplete="off" data-control="CheckBox">Status</label>');
		
		$w = new CheckBox('status', 'Status');
		$w->setSpan(3);
		$provider[] = array($w, '<label class="checkbox span3"><input type="checkbox" id="status" name="status" value="1" autocomplete="off" data-control="CheckBox">Status</label>');
		
		$w = new CheckBox('status', 'Status');
		$w->setRequired(new Required(), 'Requerido');
		$provider[] = array($w, '<label class="checkbox"><input type="checkbox" id="status" name="status" value="1" autocomplete="off" data-validate="{&quot;required&quot;:true,&quot;messages&quot;:{&quot;required&quot;:&quot;Requerido&quot;}}" data-control="CheckBox">Status</label>');
		
	return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputCheckBox();
	}

}
?>