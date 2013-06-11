<?php
use PHPBootstrap\Widget\Misc\Paragraph;

use PHPBootstrap\Render\Html5\Misc\RendererParagraph;

require_once 'tests\RendererTest.php';

/**
 * RendererParagraph test case.
 */
class RendererParagraphTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Paragraph('teste');
		$provider[] = array($w, '<p>teste</p>');
		
		$w = new Paragraph('teste');
		$w->setName('p1');
		$provider[] = array($w, '<p id="p1">teste</p>');
		
		$w = new Paragraph('teste');
		$w->setAlign(Paragraph::Center);
		$provider[] = array($w, '<p class="text-center">teste</p>');
		
		$w = new Paragraph('teste');
		$w->setStyle(Paragraph::Error);
		$provider[] = array($w, '<p class="text-error">teste</p>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererParagraph();		
	}

}