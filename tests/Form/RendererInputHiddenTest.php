<?php
use PHPBootstrap\Format\DateFormat;

use PHPBootstrap\Validate\Required\Required;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\Hidden;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputHidden;

require_once 'tests\RendererTest.php';

/**
 * RendererInputHidden test case.
 */
class RendererInputHiddenTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Hidden('upload');
		$provider[] = array($w, '<input type="hidden" id="upload" name="upload" autocomplete="off" data-control="Hidden">');
	
		$w = new Hidden('upload');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<input type="hidden" id="upload" name="upload" autocomplete="on" data-control="Hidden">');
		
		$w = new Hidden('upload');
		$w->setDisabled(true);
		$provider[] = array($w, '<input type="hidden" id="upload" name="upload" disabled="disabled" autocomplete="off" data-control="Hidden">');
		
		$w = new Hidden('upload');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<input type="hidden" id="upload" name="upload" form="form" autocomplete="off" data-control="Hidden">');
		
		$w = new Hidden('upload');
		$w->setValue('1');
		$provider[] = array($w, '<input type="hidden" id="upload" name="upload" value="1" autocomplete="off" data-control="Hidden">');
		
		$w = new Hidden('upload');
		$w->setText('1');
		$provider[] = array($w, '<input type="hidden" id="upload" name="upload" value="1" autocomplete="off" data-control="Hidden">');
		
		$w = new Hidden('upload');
		$w->addFilter('strtoupper');
		$w->setValue('Iduardo');
		$provider[] = array($w, '<input type="hidden" id="upload" name="upload" value="IDUARDO" autocomplete="off" data-control="Hidden">');
		
		$w = new Hidden('upload');
		$w->setRequired(new Required(null, 'Requerido'));
		$provider[] = array($w, '<input type="hidden" id="upload" name="upload" autocomplete="off" data-validate="{&quot;required&quot;:true,&quot;messages&quot;:{&quot;required&quot;:&quot;Requerido&quot;}}" data-control="Hidden">');
		
		$w = new Hidden('upload');
		$w->setFormatter(new DateFormat('dd/mm/yyyy'));
		$w->setValue('1985-10-06');
		$provider[] = array($w, '<input type="hidden" id="upload" name="upload" value="06/10/1985" autocomplete="off" data-control="Hidden">');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputHidden();
	}
}
?>