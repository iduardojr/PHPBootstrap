<?php
use PHPBootstrap\Widget\Form\Controls\Decorator\TypeHead;
use PHPBootstrap\Format\NumberFormat;
use PHPBootstrap\Validate\Required\Required;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\TextBox;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputTextBox;

require_once 'tests\RendererTest.php';

/**
 * RendererInputTextBox test case.
 */
class RendererInputTextBoxTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new TextBox('number');
		$provider[] = array($w, '<input type="text" id="number" name="number" autocomplete="off" data-control="TextBox">' );
		
		$w = new TextBox('number');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<input type="text" id="number" name="number" autocomplete="on" data-control="TextBox">' );
		
		$w = new TextBox('number');
		$w->setDisabled(true);
		$provider[] = array($w, '<input type="text" id="number" name="number" readonly="readonly" autocomplete="off" data-control="TextBox">' );
		
		$w = new TextBox('number');
		$w->setText(2.93);
		$provider[] = array($w, '<input type="text" id="number" name="number" value="2.93" autocomplete="off" data-control="TextBox">' );
		
		$w = new TextBox('number');
		$w->setFormatter(new NumberFormat(2, ',', ''));
		$w->setValue(2.93);
		$provider[] = array($w, '<input type="text" id="number" name="number" value="2,93" autocomplete="off" data-control="TextBox">' );
		
		$w = new TextBox('number');
		$w->setValue(2.93);
		$provider[] = array($w, '<input type="text" id="number" name="number" value="2.93" autocomplete="off" data-control="TextBox">' );
		
		$w = new TextBox('number');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<input type="text" id="number" name="number" form="form" autocomplete="off" data-control="TextBox">' );
		
		$w = new TextBox('number');
		$w->setRounded(true);
		$provider[] = array($w, '<input type="text" id="number" name="number" class="search-query" autocomplete="off" data-control="TextBox">' );
		
		$w = new TextBox('number');
		$w->setSpan(3);
		$provider[] = array($w, '<input type="text" id="number" name="number" class="span3" autocomplete="off" data-control="TextBox">' );
		
		$w = new TextBox('number');
		$w->setPlaceholder('Number');
		$provider[] = array($w, '<input type="text" id="number" name="number" placeholder="Number" autocomplete="off" data-control="TextBox">' );
		
		$w = new TextBox('number');
		$w->setRequired(new Required(null, 'Requerido'));
		$provider[] = array($w, '<input type="text" id="number" name="number" autocomplete="off" data-validate="{&quot;required&quot;:true,&quot;messages&quot;:{&quot;required&quot;:&quot;Requerido&quot;}}" data-control="TextBox">' );
		
		$w = new TextBox('number');
		$w->setMask('999.99');
		$provider[] = array($w, '<input type="text" id="number" name="number" autocomplete="off" data-control="TextBox" data-mask="999.99">' );
		
		$w = new TextBox('number');
		$w->setSuggestion(new TypeHead());
		$provider[] = array($w, '<input type="text" id="number" name="number" autocomplete="off" data-control="TextBox" data-provide="typeahead" data-source="[]">' );
		
		return $provider;
	}


	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputTextBox();
	}

}
?>