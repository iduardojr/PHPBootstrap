<?php
use PHPBootstrap\Widget\Misc\Paragraph;

use PHPBootstrap\Render\Html5\Layout\RendererRow;

use PHPBootstrap\Widget\Layout\Row;

require_once 'tests\RendererTest.php';

/**
 * RendererRow test case.
 */
class RendererRowTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Row();
		$provider[] = array($w, '<div class="row"></div>');
		
		$w = new Row();
		$w->setName('box');
		$provider[] = array($w, '<div id="box" class="row"></div>');
		
		$w = new Row();
		$w->setFluid(true);
		$provider[] = array($w, '<div class="row-fluid"></div>');
		
		$w = new Row();
		$w->append(new Paragraph('teste'));
		$provider[] = array($w, '<div class="row"><p>teste</p></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererRow();
	}

}
?>