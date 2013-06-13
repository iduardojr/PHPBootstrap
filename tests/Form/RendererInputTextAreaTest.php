<?php
use PHPBootstrap\Validate\Required\Required;

use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\TextArea;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputTextArea;

require_once 'tests\RendererTest.php';

/**
 * RendererInputTextArea test case.
 */
class RendererInputTextAreaTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new TextArea('text');
		$provider[] = array($w, '<textarea id="text" name="text" autocomplete="off" data-control="TextArea"></textarea>');
	
		$w = new TextArea('text');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<textarea id="text" name="text" autocomplete="on" data-control="TextArea"></textarea>');
		
		$w = new TextArea('text');
		$w->setDisabled(true);
		$provider[] = array($w, '<textarea id="text" name="text" readonly="readonly" autocomplete="off" data-control="TextArea"></textarea>');
		
		$w = new TextArea('text');
		$w->setPlaceholder('Place');
		$provider[] = array($w, '<textarea id="text" name="text" placeholder="Place" autocomplete="off" data-control="TextArea"></textarea>');

		$w = new TextArea('text');
		$w->setSpan(3);
		$provider[] = array($w, '<textarea id="text" name="text" class="span3" autocomplete="off" data-control="TextArea"></textarea>');
		
		$w = new TextArea('text');
		$w->setRows(3);
		$provider[] = array($w, '<textarea id="text" name="text" rows="3" autocomplete="off" data-control="TextArea"></textarea>');
		
		$w = new TextArea('text');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<textarea id="text" name="text" form="form" autocomplete="off" data-control="TextArea"></textarea>');
		
		$w = new TextArea('text');
		$w->setValue('TextArea');
		$provider[] = array($w, '<textarea id="text" name="text" autocomplete="off" data-control="TextArea">TextArea</textarea>');
		
		$w = new TextArea('text');
		$w->setRequired(new Required(null, 'Requerido'));
		$provider[] = array($w, '<textarea id="text" name="text" autocomplete="off" data-validate="{&quot;required&quot;:true,&quot;messages&quot;:{&quot;required&quot;:&quot;Requerido&quot;}}" data-control="TextArea"></textarea>');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputTextArea();
	}

}
?>