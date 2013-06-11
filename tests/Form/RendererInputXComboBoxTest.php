<?php
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\XComboBox;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputXComboBox;

require_once 'tests\RendererTest.php';

/**
 * RendererInputXCombobox test case.
 */
class RendererInputXComboBoxTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new XComboBox('combo');
		$provider[] = array($w, '<div id="combo" class="input-append" data-control="XComboBox"><input type="text" autocomplete="off" data-source="[]" data-items="0"><input type="hidden" name="combo" autocomplete="off"><button type="button" class="btn"><i class="icon-chevron-down"></i></button></div>');
	
		$w = new XComboBox('combo');
		$w->setPlaceholder('Combo');
		$provider[] = array($w, '<div id="combo" class="input-append" data-control="XComboBox"><input type="text" placeholder="Combo" autocomplete="off" data-source="[]" data-items="0"><input type="hidden" name="combo" autocomplete="off"><button type="button" class="btn"><i class="icon-chevron-down"></i></button></div>');
		
		$w = new XComboBox('combo');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<div id="combo" class="input-append" data-control="XComboBox"><input type="text" autocomplete="on" data-source="[]" data-items="0"><input type="hidden" name="combo" autocomplete="on"><button type="button" class="btn"><i class="icon-chevron-down"></i></button></div>');
		
		$w = new XComboBox('combo');
		$w->setDisabled(true);
		$provider[] = array($w, '<div id="combo" class="input-append disabled" data-control="XComboBox"><input type="text" readonly="readonly" autocomplete="off" data-source="[]" data-items="0"><input type="hidden" name="combo" disabled="disabled" autocomplete="off"><button type="button" class="btn" disabled="disabled"><i class="icon-chevron-down"></i></button></div>');
		
		$w = new XComboBox('combo');
		$w->setSpan(5);
		$provider[] = array($w, '<div id="combo" class="input-append" data-control="XComboBox"><input type="text" class="span5" autocomplete="off" data-source="[]" data-items="0"><input type="hidden" name="combo" autocomplete="off"><button type="button" class="btn"><i class="icon-chevron-down"></i></button></div>');
		
		$w = new XComboBox('combo');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<div id="combo" class="input-append" data-control="XComboBox"><input type="text" autocomplete="off" data-source="[]" data-items="0"><input type="hidden" name="combo" autocomplete="off" form="form"><button type="button" class="btn"><i class="icon-chevron-down"></i></button></div>');
		
		$w = new XComboBox('combo');
		$w->setButtonStyle(Button::Danger);
		$provider[] = array($w, '<div id="combo" class="input-append" data-control="XComboBox"><input type="text" autocomplete="off" data-source="[]" data-items="0"><input type="hidden" name="combo" autocomplete="off"><button type="button" class="btn btn-danger"><i class="icon-chevron-down icon-white"></i></button></div>');
		
		$w = new XComboBox('combo');
		$w->addOption('M', 'Masculino');
		$provider[] = array($w, '<div id="combo" class="input-append" data-control="XComboBox"><input type="text" autocomplete="off" data-source="[' .htmlentities('{"label":"Masculino","value":"M"}'). ']" data-items="1"><input type="hidden" name="combo" autocomplete="off"><button type="button" class="btn"><i class="icon-chevron-down"></i></button></div>');
		
		$w = new XComboBox('combo');
		$w->addOption('M', 'Masculino');
		$w->addOption('F', 'Feminino');
		$provider[] = array($w, '<div id="combo" class="input-append" data-control="XComboBox"><input type="text" autocomplete="off" data-source="[' .htmlentities('{"label":"Masculino","value":"M"},{"label":"Feminino","value":"F"}'). ']" data-items="2"><input type="hidden" name="combo" autocomplete="off"><button type="button" class="btn"><i class="icon-chevron-down"></i></button></div>');
		
		$w = new XComboBox('combo');
		$w->addOption('M', 'Masculino');
		$w->addOption('F', 'Feminino');
		$w->setValue('F');
		$provider[] = array($w, '<div id="combo" class="input-append" data-control="XComboBox"><input type="text" value="Feminino" autocomplete="off" data-source="[' .htmlentities('{"label":"Masculino","value":"M"},{"label":"Feminino","value":"F"}'). ']" data-items="2"><input type="hidden" name="combo" value="F" autocomplete="off"><button type="button" class="btn"><i class="icon-remove"></i></button></div>');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputXComboBox();
	}
	
}
?>