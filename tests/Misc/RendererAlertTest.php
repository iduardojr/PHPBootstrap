<?php
use PHPBootstrap\Widget\Misc\Paragraph;

use PHPBootstrap\Widget\Misc\Alert;
use PHPBootstrap\Render\Html5\Misc\RendererAlert;

require_once 'tests\RendererTest.php';

/**
 * RendererAlert test case.
 */
class RendererAlertTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererAlert();
	}
	
	/**
	 * @see RendererTest::provider()
	 */
	 public function provider() {
	 	$w = new Alert(new Paragraph('teste'));
	 	$provider[] = array($w, '<div class="alert fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><p>teste</p></div>');
	 	
	 	$w = new Alert('teste');
		$provider[] = array($w, '<div class="alert fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>teste</div>');
		
		$w = new Alert('teste');
		$w->setName('message');
		$provider[] = array($w, '<div id="message" class="alert fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>teste</div>');
		
		$w = new Alert('teste');
		$w->setSeverity(Alert::Success);
		$provider[] = array($w, '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>teste</div>');
		
		$w = new Alert('teste');
		$w->setBlock(true);
		$provider[] = array($w, '<div class="alert alert-block fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>teste</div>');
		
		$w = new Alert('teste');
		$w->setClosable(false);
		$provider[] = array($w, '<div class="alert fade in">teste</div>');
		
		$w = new Alert('teste');
		$w->setAnimation(false);
		$provider[] = array($w, '<div class="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>teste</div>');
		
		return $provider;
	 }
	 
}
?>