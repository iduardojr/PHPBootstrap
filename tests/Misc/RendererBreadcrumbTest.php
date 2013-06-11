<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Misc\Breadcrumb;
use PHPBootstrap\Render\Html5\Misc\RendererBreadcrumb;

require_once 'tests\RendererTest.php';

/**
 * RendererBreadcrumb test case.
 */
class RendererBreadcrumbTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Breadcrumb('bread');
		$provider[] = array($w, '<ul id="bread" class="breadcrumb"></ul>');
		
		$w = new Breadcrumb('bread');
		$w->addItem('Home', new TgLink(new Action('Test')));
		$provider[] = array($w, '<ul id="bread" class="breadcrumb"><li class="active"><a href="?class=Test">Home</a></li></ul>');
		
		$w = new Breadcrumb('bread');
		$w->addItem('Home', new TgLink(new Action('Test')));
		$w->addItem('Library', new TgLink(new Action('Test2')));
		$provider[] = array($w, '<ul id="bread" class="breadcrumb"><li><a href="?class=Test">Home</a> <span class="divider">/</span></li><li class="active"><a href="?class=Test2">Library</a></li></ul>');
		
		$w = new Breadcrumb('bread');
		$w->addItem('Home', new TgLink(new Action('Test')));
		$w->addItem('Library', new TgLink(new Action('Test2')));
		$w->addItem('Data');
		$provider[] = array($w, '<ul id="bread" class="breadcrumb"><li><a href="?class=Test">Home</a> <span class="divider">/</span></li><li><a href="?class=Test2">Library</a> <span class="divider">/</span></li><li class="active">Data</li></ul>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererBreadcrumb();
	}

}
?>