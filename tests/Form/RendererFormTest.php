<?php
use PHPBootstrap\Widget\Form\Controls\TextBox;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Render\Html5\Form\RendererForm;

require_once 'tests\RendererTest.php';

/**
 * RendererForm test case.
 */
class RendererFormTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Form('form');
		$provider[] = array($w, '<div id="form"><form name="form" method="post" enctype="application/x-www-form-urlencoded"></form></div>');
	
		$w = new Form('form');
		$w->setStyle(Form::Horizontal);
		$provider[] = array($w, '<div id="form" class="form-horizontal"><form name="form" method="post" enctype="application/x-www-form-urlencoded"></form></div>');
		
		$w = new Form('form');
		$w->addButton(new Button('Submit'));
		$provider[] = array($w, '<div id="form"><div class="form-actions"><button type="button" class="btn">Submit</button> </div><form name="form" method="post" enctype="application/x-www-form-urlencoded"></form></div>');
		
		$w = new Form('form');
		$w->append(new TextBox('entry'));
		$provider[] = array($w, '<div id="form"><input type="text" id="entry" name="entry" autocomplete="off" data-control="TextBox"><form name="form" method="post" enctype="application/x-www-form-urlencoded"></form></div>');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererForm();
	}
	
}
?>