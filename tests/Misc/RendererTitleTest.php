<?php
use PHPBootstrap\Widget\Misc\Title;
use PHPBootstrap\Render\Html5\Misc\RendererTitle;

require_once 'tests\RendererTest.php';

/**
 * RendererTitle test case.
 */
class RendererTitleTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Title('Teste');
		$provider[] = array($w, '<h1>Teste</h1>');
		
		$w = new Title('Teste');
		$w->setName('title');
		$provider[] = array($w, '<h1 id="title">Teste</h1>');
		
		$w = new Title('Teste');
		$w->setAlign(Title::Center);
		$provider[] = array($w, '<h1 class="text-center">Teste</h1>');
		
		$w = new Title('Teste');
		$w->setPageHeader(true);
		$provider[] = array($w, '<h1 class="page-header">Teste</h1>');
		
		$w = new Title('Teste');
		$w->setStyle(Title::Warning);
		$provider[] = array($w, '<h1 class="text-warning">Teste</h1>');
		
		$w = new Title('Teste');
		$w->setLevel(3);
		$provider[] = array($w, '<h3>Teste</h3>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTitle();
	}

}
?>