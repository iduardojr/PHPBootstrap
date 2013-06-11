<?php
use PHPBootstrap\Validate\Required\Required;

use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\ComboBox;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputComboBox;

require_once 'tests\RendererTest.php';

/**
 * RendererInputComboBox test case.
 */
class RendererInputComboBoxTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new ComboBox('combo');
		$provider[] = array($w, '<select id="combo" name="combo" autocomplete="off" data-control="ComboBox"></select>');
	
		$w = new ComboBox('combo');
		$w->addOption('M', 'Masculino');
		$w->addOption('F', 'Feminino');
		$provider[] = array($w, '<select id="combo" name="combo" autocomplete="off" data-control="ComboBox"><option value="M">Masculino</option><option value="F">Feminino</option></select>');
		
		$w = new ComboBox('combo');
		$w->addOption('M', 'Masculino');
		$w->addOption('F', 'Feminino');
		$w->setValue('M');
		$provider[] = array($w, '<select id="combo" name="combo" autocomplete="off" data-control="ComboBox"><option value="M" selected="selected">Masculino</option><option value="F">Feminino</option></select>');
		
		$w = new ComboBox('combo');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<select id="combo" name="combo" autocomplete="on" data-control="ComboBox"></select>');
		
		$w = new ComboBox('combo');
		$w->setDisabled(true);
		$provider[] = array($w, '<select id="combo" name="combo" disabled="disabled" autocomplete="off" data-control="ComboBox"></select>');
		
		$w = new ComboBox('combo');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<select id="combo" name="combo" form="form" autocomplete="off" data-control="ComboBox"></select>');
		
		$w = new ComboBox('combo');
		$w->setSpan(3);
		$provider[] = array($w, '<select id="combo" name="combo" class="span3" autocomplete="off" data-control="ComboBox"></select>');
		
		$w = new ComboBox('combo');
		$w->setRequired(new Required(), 'Requerido');
		$provider[] = array($w, '<select id="combo" name="combo" autocomplete="off" data-validate="{&quot;required&quot;:true,&quot;messages&quot;:{&quot;required&quot;:&quot;Requerido&quot;}}" data-control="ComboBox"></select>');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputComboBox();
	}
	
}
?>