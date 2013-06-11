<?php
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Table\TgTableSelect;
use PHPBootstrap\Render\Html5\Table\RendererTgTableSelect;

require_once 'tests\RendererTest.php';

/**
 * RendererTgTableSelect test case.
 */
class RendererTgTableSelectTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new TgTableSelect();
		$provider[] = array($w, '<a data-toggle="table-select"></a>', new Context(new HtmlNode('a')));
		
		$w = new TgTableSelect();
		$w->setTogglable(TgTableSelect::ToggleAll);
		$provider[] = array($w, '<a data-toggle="table-select" data-select="all"></a>', new Context(new HtmlNode('a')));
		
		$w = new TgTableSelect();
		$w->setParameters(array('d' => '1'));
		$provider[] = array($w, '<a data-toggle="table-select"></a>', new Context(new HtmlNode('a')));
		
		return $provider;
		
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgTableSelect();
	}

}
?>