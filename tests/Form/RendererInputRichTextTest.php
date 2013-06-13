<?php
use PHPBootstrap\Validate\Required\Required;

use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\RichText;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputRichText;

require_once 'tests\RendererTest.php';

/**
 * RendererInputTextEditor test case.
 */
class RendererInputRichTextTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new RichText('text');
		$provider[] = array($w, '<textarea id="text" name="text" autocomplete="off" data-control="RichText" data-richtext-type="standard"></textarea>');
	
		$w = new RichText('text');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<textarea id="text" name="text" autocomplete="on" data-control="RichText" data-richtext-type="standard"></textarea>');
		
		$w = new RichText('text');
		$w->setDisabled(true);
		$provider[] = array($w, '<textarea id="text" name="text" readonly="readonly" autocomplete="off" data-control="RichText" data-richtext-type="standard"></textarea>');
		
		$w = new RichText('text');
		$w->setPlaceholder('Place');
		$provider[] = array($w, '<textarea id="text" name="text" placeholder="Place" autocomplete="off" data-control="RichText" data-richtext-type="standard"></textarea>');

		$w = new RichText('text');
		$w->setSpan(3);
		$provider[] = array($w, '<textarea id="text" name="text" class="span3" autocomplete="off" data-control="RichText" data-richtext-type="standard"></textarea>');
		
		$w = new RichText('text');
		$w->setRows(3);
		$provider[] = array($w, '<textarea id="text" name="text" rows="3" autocomplete="off" data-control="RichText" data-richtext-type="standard"></textarea>');
		
		$w = new RichText('text');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<textarea id="text" name="text" form="form" autocomplete="off" data-control="RichText" data-richtext-type="standard"></textarea>');
		
		$w = new RichText('text');
		$w->setValue('RichText');
		$provider[] = array($w, '<textarea id="text" name="text" autocomplete="off" data-control="RichText" data-richtext-type="standard">RichText</textarea>');
		
		$w = new RichText('text');
		$w->setRequired(new Required(null, 'Requerido'));
		$provider[] = array($w, '<textarea id="text" name="text" autocomplete="off" data-validate="{&quot;required&quot;:true,&quot;messages&quot;:{&quot;required&quot;:&quot;Requerido&quot;}}" data-control="RichText" data-richtext-type="standard"></textarea>');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputRichText();
	}

}
?>