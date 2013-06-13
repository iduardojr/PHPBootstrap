<?php
use PHPBootstrap\Validate\Required\Required;

use PHPBootstrap\Widget\Form\Controls\CheckBoxList;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputCheckBoxList;
use PHPBootstrap\Widget\Form\Form;

require_once 'tests\RendererTest.php';

/**
 * RendererInputCheckBoxList test case.
 */
class RendererInputCheckBoxListTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new CheckBoxList('gender', true);
		$provider[] = array($w, '<div id="gender" data-control="CheckBoxList"></div>');
		
		$w = new CheckBoxList('gender', false);
		$w->setSpan(3);
		$provider[] = array($w, '<div id="gender" class="span3" data-control="CheckBoxList"></div>');
		
		$w = new CheckBoxList('gender', true);
		$w->setSpan(3);
		$w->addOption('M', 'Masculino');
		$provider[] = array($w, '<div id="gender" data-control="CheckBoxList"><label class="checkbox inline span3"><input type="checkbox" name="gender[]" value="M" autocomplete="off">Masculino</label></div>');
		
		$w = new CheckBoxList('gender', true);
		$w->addOption('M', 'Masculino');
		$provider[] = array($w, '<div id="gender" data-control="CheckBoxList"><label class="checkbox inline"><input type="checkbox" name="gender[]" value="M" autocomplete="off">Masculino</label></div>');
		
		$w = new CheckBoxList('gender', false);
		$w->addOption('M', 'Masculino');
		$provider[] = array($w, '<div id="gender" data-control="CheckBoxList"><label class="checkbox"><input type="checkbox" name="gender[]" value="M" autocomplete="off">Masculino</label></div>');
		
		$w = new CheckBoxList('gender', true);
		$w->addOption('M', 'Masculino');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<div id="gender" data-control="CheckBoxList"><label class="checkbox inline"><input type="checkbox" name="gender[]" value="M" autocomplete="on">Masculino</label></div>');
		
		$w = new CheckBoxList('gender', true);
		$w->addOption('M', 'Masculino');
		$w->setDisabled(true);
		$provider[] = array($w, '<div id="gender" data-control="CheckBoxList"><label class="checkbox inline"><input type="checkbox" name="gender[]" value="M" disabled="disabled" autocomplete="off">Masculino</label></div>');
		
		$w = new CheckBoxList('gender', true);
		$w->addOption('M', 'Masculino');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<div id="gender" data-control="CheckBoxList"><label class="checkbox inline"><input type="checkbox" name="gender[]" value="M" form="form" autocomplete="off">Masculino</label></div>');
		
		$w = new CheckBoxList('gender', true);
		$w->addOption('M', 'Masculino');
		$w->setValue('M');
		$provider[] = array($w, '<div id="gender" data-control="CheckBoxList"><label class="checkbox inline"><input type="checkbox" name="gender[]" value="M" checked="checked" autocomplete="off">Masculino</label></div>');
		
		$w = new CheckBoxList('gender', true);
		$w->addOption('M', 'Masculino');
		$w->setRequired(new Required(null, 'Requerido'));
		$provider[] = array($w, '<div id="gender" data-control="CheckBoxList"><label class="checkbox inline"><input type="checkbox" name="gender[]" value="M" autocomplete="off" data-validate="{&quot;required&quot;:true,&quot;messages&quot;:{&quot;required&quot;:&quot;Requerido&quot;}}">Masculino</label></div>');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputCheckBoxList();
	}

}
?>