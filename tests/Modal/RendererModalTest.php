<?php
use PHPBootstrap\Widget\Misc\Paragraph;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Misc\Title;
use PHPBootstrap\Widget\Modal\Modal;
use PHPBootstrap\Render\Html5\Modal\RendererModal;

require_once 'tests\RendererTest.php';

/**
 * RendererModal test case.
 */
class RendererModalTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		
		$header = '<div class="modal-header"><a href="#" class="close" data-dismiss="modal">&times;</a><h3>Modal</h3></div>';
		$body = '<div class="modal-body"></div>';
		$footer = '';
		$w = new Modal('modal', new Title('Modal', 3));
		$provider[] = array($w, '<div id="modal" class="modal fade hide">' . $header . $body . $footer .'</div>');
		
		$w = new Modal('modal', new Title('Modal', 3));
		$w->setHide(false);
		$provider[] = array($w, '<div id="modal" class="modal">' . $header . $body . $footer .'</div>');
		
		$w = new Modal('modal', new Title('Modal', 3));
		$w->setWidth(100);
		$provider[] = array($w, '<div id="modal" class="modal fade hide" style="width: 100px; margin-left: -50px">' . $header . $body . $footer .'</div>');
		
		$w = new Modal('modal', new Title('Modal', 3));
		$w->setHeight(100);
		$body = '<div class="modal-body" style="height: 100px"></div>';
		$provider[] = array($w, '<div id="modal" class="modal fade hide">' . $header . $body . $footer .'</div>');
		
		$w = new Modal('modal', new Title('Modal', 3));
		$w->setBody(new Paragraph('Test'));
		$body = '<div class="modal-body"><p>Test</p></div>';
		$provider[] = array($w, '<div id="modal" class="modal fade hide">' . $header . $body . $footer .'</div>');
		
		$w = new Modal('modal', new Title('Modal', 3));
		$w->addButton(new Button('Close'));
		$body = '<div class="modal-body"></div>';
		$footer = '<div class="modal-footer"><button type="button" class="btn">Close</button></div>';
		$provider[] = array($w, '<div id="modal" class="modal fade hide">' . $header . $body . $footer .'</div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererModal();
	}

}