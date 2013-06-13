<?php
use PHPBootstrap\Validate\Required\Required;

use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\PasswordBox;
use PHPBootstrap\Render\Html5\Form\Controls\RendererInputPasswordBox;

require_once 'tests\RendererTest.php';

/**
 * RendererInputPassword test case.
 */
class RendererInputPasswordBoxTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new PasswordBox('password');
		$provider[] = array($w, '<input type="password" id="password" name="password" autocomplete="off" data-control="PasswordBox">' );
		
		$w = new PasswordBox('password');
		$w->setAutoComplete(true);
		$provider[] = array($w, '<input type="password" id="password" name="password" autocomplete="on" data-control="PasswordBox">' );
		
		$w = new PasswordBox('password');
		$w->setDisabled(true);
		$provider[] = array($w, '<input type="password" id="password" name="password" readonly="readonly" autocomplete="off" data-control="PasswordBox">' );
		
		$w = new PasswordBox('password');
		$w->setValue('teste');
		$provider[] = array($w, '<input type="password" id="password" name="password" autocomplete="off" data-control="PasswordBox">' );
		
		$w = new PasswordBox('password');
		$w->setText('teste');
		$provider[] = array($w, '<input type="password" id="password" name="password" autocomplete="off" data-control="PasswordBox">' );
		
		
		$w = new PasswordBox('password');
		$w->setForm(new Form('form'));
		$provider[] = array($w, '<input type="password" id="password" name="password" form="form" autocomplete="off" data-control="PasswordBox">' );
		
		$w = new PasswordBox('password');
		$w->setRounded(true);
		$provider[] = array($w, '<input type="password" id="password" name="password" class="search-query" autocomplete="off" data-control="PasswordBox">' );
		
		$w = new PasswordBox('password');
		$w->setSpan(3);
		$provider[] = array($w, '<input type="password" id="password" name="password" class="span3" autocomplete="off" data-control="PasswordBox">' );
		
		$w = new PasswordBox('password');
		$w->setPlaceholder('Password');
		$provider[] = array($w, '<input type="password" id="password" name="password" placeholder="Password" autocomplete="off" data-control="PasswordBox">' );
		
		$w = new PasswordBox('password');
		$w->setRequired(new Required(null, 'Requerido'));
		$provider[] = array($w, '<input type="password" id="password" name="password" autocomplete="off" data-validate="{&quot;required&quot;:true,&quot;messages&quot;:{&quot;required&quot;:&quot;Requerido&quot;}}" data-control="PasswordBox">' );
		
		return $provider;
	}


	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererInputPasswordBox();
	}

}
?>