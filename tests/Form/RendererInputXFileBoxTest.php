<?php
use PHPBootstrap\Validate\Required\Required;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\XFileBox;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputXFileBox;

require_once 'tests\RendererTest.php';

/**
 * RendererInputXFileBox test case.
 */
class RendererInputXFileBoxTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new XFileBox('upload');
		$provider[] = array($w, '<div id="upload" class="input-append" data-control="XFileBox" data-label-add="Procurar" data-label-clear="Remover"><input type="text" readonly="readonly" autocomplete="off"><input type="file" name="upload" class="hide" autocomplete="off"><button type="button" class="btn">Procurar</button></div>');
		
		$w = new XFileBox('upload');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<div id="upload" class="input-append" data-control="XFileBox" data-label-add="Procurar" data-label-clear="Remover"><input type="text" readonly="readonly" autocomplete="on"><input type="file" name="upload" class="hide" autocomplete="on"><button type="button" class="btn">Procurar</button></div>');
		
		$w = new XFileBox('upload');
		$w->setDisabled(true);
		$provider[] = array($w, '<div id="upload" class="input-append disabled" data-control="XFileBox" data-label-add="Procurar" data-label-clear="Remover"><input type="text" readonly="readonly" autocomplete="off"><input type="file" name="upload" class="hide" disabled="disabled" autocomplete="off"><button type="button" class="btn" disabled="disabled">Procurar</button></div>');
		
		$w = new XFileBox('upload');
		$w->setPlaceholder('Place');
		$provider[] = array($w, '<div id="upload" class="input-append" data-control="XFileBox" data-label-add="Procurar" data-label-clear="Remover"><input type="text" readonly="readonly" placeholder="Place" autocomplete="off"><input type="file" name="upload" class="hide" autocomplete="off"><button type="button" class="btn">Procurar</button></div>');
		
		$w = new XFileBox('upload');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<div id="upload" class="input-append" data-control="XFileBox" data-label-add="Procurar" data-label-clear="Remover"><input type="text" readonly="readonly" autocomplete="off"><input type="file" name="upload" class="hide" form="form" autocomplete="off"><button type="button" class="btn">Procurar</button></div>');
		
		$w = new XFileBox('upload');
		$w->setSpan(4);
		$provider[] = array($w, '<div id="upload" class="input-append" data-control="XFileBox" data-label-add="Procurar" data-label-clear="Remover"><input type="text" class="span4" readonly="readonly" autocomplete="off"><input type="file" name="upload" class="hide" autocomplete="off"><button type="button" class="btn">Procurar</button></div>');
		
		$w = new XFileBox('upload');
		$w->setRequired(new Required(null, 'Requerido'));
		$provider[] = array($w, '<div id="upload" class="input-append" data-control="XFileBox" data-label-add="Procurar" data-label-clear="Remover"><input type="text" readonly="readonly" autocomplete="off"><input type="file" name="upload" class="hide" autocomplete="off" data-validate="{&quot;required&quot;:true,&quot;messages&quot;:{&quot;required&quot;:&quot;Requerido&quot;}}"><button type="button" class="btn">Procurar</button></div>');
		
		$w = new XFileBox('upload');
		$w->setButtonStyle(Button::Danger);
		$provider[] = array($w, '<div id="upload" class="input-append" data-control="XFileBox" data-label-add="Procurar" data-label-clear="Remover"><input type="text" readonly="readonly" autocomplete="off"><input type="file" name="upload" class="hide" autocomplete="off"><button type="button" class="btn btn-danger">Procurar</button></div>');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputXFileBox();
	}
	
}
?>