<?php
use PHPBootstrap\Validate\Required\Required;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\FileBox;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputFileBox;

require_once 'tests\RendererTest.php';

/**
 * RendererInputFile test case.
 */
class RendererInputFileBoxTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new FileBox('upload');
		$provider[] = array($w, '<input type="file" id="upload" name="upload" autocomplete="off" data-control="FileBox">');
	
		$w = new FileBox('upload');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<input type="file" id="upload" name="upload" autocomplete="on" data-control="FileBox">');
		
		$w = new FileBox('upload');
		$w->setDisabled(true);
		$provider[] = array($w, '<input type="file" id="upload" name="upload" disabled="disabled" autocomplete="off" data-control="FileBox">');
		
		$w = new FileBox('upload');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<input type="file" id="upload" name="upload" form="form" autocomplete="off" data-control="FileBox">');
		
		$w = new FileBox('upload');
		$w->setValue('teste');
		$provider[] = array($w, '<input type="file" id="upload" name="upload" autocomplete="off" data-control="FileBox">');
		
		$w = new FileBox('upload');
		$w->setRequired(new Required(), 'Requerido');
		$provider[] = array($w, '<input type="file" id="upload" name="upload" autocomplete="off" data-validate="{&quot;required&quot;:true,&quot;messages&quot;:{&quot;required&quot;:&quot;Requerido&quot;}}" data-control="FileBox">');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputFileBox();
	}
}
?>