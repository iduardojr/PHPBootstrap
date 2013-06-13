<?php
use PHPBootstrap\Validate\Required\Required;

use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\RadioButtonList;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputRadioButtonList;

require_once 'tests\RendererTest.php';

/**
 * RendererInputRadioButtonList test case.
 */
class RendererInputRadioButtonListTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new RadioButtonList('gender', true);
		$provider[] = array($w, '<div id="gender" data-control="RadioButtonList"></div>');
		
		$w = new RadioButtonList('gender', true);
		$provider[] = array($w, '<div id="gender" data-control="RadioButtonList"></div>');
		
		$w = new RadioButtonList('gender', false);
		$w->setSpan(3);
		$provider[] = array($w, '<div id="gender" class="span3" data-control="RadioButtonList"></div>');
		
		$w = new RadioButtonList('gender', true);
		$w->addOption('M', 'Masculino');
		$w->setSpan(3);
		$provider[] = array($w, '<div id="gender" data-control="RadioButtonList"><label class="radio inline span3"><input type="radio" name="gender" value="M" autocomplete="off">Masculino</label></div>');
		
		
		$w = new RadioButtonList('gender', true);
		$w->addOption('M', 'Masculino');
		$provider[] = array($w, '<div id="gender" data-control="RadioButtonList"><label class="radio inline"><input type="radio" name="gender" value="M" autocomplete="off">Masculino</label></div>');
		
		$w = new RadioButtonList('gender', false);
		$w->addOption('M', 'Masculino');
		$provider[] = array($w, '<div id="gender" data-control="RadioButtonList"><label class="radio"><input type="radio" name="gender" value="M" autocomplete="off">Masculino</label></div>');
		
		$w = new RadioButtonList('gender', true);
		$w->addOption('M', 'Masculino');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<div id="gender" data-control="RadioButtonList"><label class="radio inline"><input type="radio" name="gender" value="M" autocomplete="on">Masculino</label></div>');
		
		$w = new RadioButtonList('gender', true);
		$w->addOption('M', 'Masculino');
		$w->setDisabled(true);
		$provider[] = array($w, '<div id="gender" data-control="RadioButtonList"><label class="radio inline"><input type="radio" name="gender" value="M" disabled="disabled" autocomplete="off">Masculino</label></div>');
		
		$w = new RadioButtonList('gender', true);
		$w->addOption('M', 'Masculino');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<div id="gender" data-control="RadioButtonList"><label class="radio inline"><input type="radio" name="gender" value="M" form="form" autocomplete="off">Masculino</label></div>');
		
		$w = new RadioButtonList('gender', true);
		$w->addOption('M', 'Masculino');
		$w->setValue('M');
		$provider[] = array($w, '<div id="gender" data-control="RadioButtonList"><label class="radio inline"><input type="radio" name="gender" value="M" checked="checked" autocomplete="off">Masculino</label></div>');
		
		$w = new RadioButtonList('gender', true);
		$w->addOption('M', 'Masculino');
		$w->setRequired(new Required(null, 'Requerido'));
		$provider[] = array($w, '<div id="gender" data-control="RadioButtonList"><label class="radio inline"><input type="radio" name="gender" value="M" autocomplete="off" data-validate="{&quot;required&quot;:true,&quot;messages&quot;:{&quot;required&quot;:&quot;Requerido&quot;}}">Masculino</label></div>');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputRadioButtonList();
	}

}
?>