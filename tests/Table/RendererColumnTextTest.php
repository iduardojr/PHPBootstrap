<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Table\DataSource;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Table\Table;
use PHPBootstrap\Widget\Table\ColumnText;
use PHPBootstrap\Render\Html5\Table\RendererColumnText;

require_once 'tests\RendererTest.php';

/**
 * RendererColumnText test case.
 */
class RendererColumnTextTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new ColumnText('id', '#');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$provider[] = array($w, '<th><span data-order="id">#</span></th>', new Context(new HtmlNode('th')));
		$provider[] = array($w, '<td><div class="cell">1</div></td>', new Context(new HtmlNode('td')));
		
		$w = new ColumnText('id', '#');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setSpan(2);
		$provider[] = array($w, '<th class="span2"><span data-order="id">#</span></th>', new Context(new HtmlNode('th')));
		
		$w = new ColumnText('id', '#');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setSpan(200);
		$provider[] = array($w, '<th style="width: 200px"><span data-order="id">#</span></th>', new Context(new HtmlNode('th')));
		
		$w = new ColumnText('id', '#');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setAlign(ColumnText::Left);
		$provider[] = array($w, '<th class="text-left"><span data-order="id">#</span></th>', new Context(new HtmlNode('th')));
		$provider[] = array($w, '<td><div class="cell text-left">1</div></td>', new Context(new HtmlNode('td')));
		
		$w = new ColumnText('id', '#');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setFilter(function ( $value ){ return '00' . $value; });
		$provider[] = array($w, '<td><div class="cell">001</div></td>', new Context(new HtmlNode('td')));	
		
		$w = new ColumnText('name', '#');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$provider[] = array($w, '<th><span data-order="name">#<i class="ui-icon-carat-1-n"></i></span></th>', new Context(new HtmlNode('th')));
		
		$w = new ColumnText('name', '#');
		$w->setTable(new Table('dt', new MockDS(10, 5, 0, 'name', DataSource::Asc)));
		$provider[] = array($w, '<th><span data-order="name">#<i class="ui-icon-carat-1-s"></i></span></th>', new Context(new HtmlNode('th')));
		
		$w = new ColumnText('id', '#');
		$w->setTable(new Table('dt', new MockDS(10, 5, 0, 'name', DataSource::Asc)));
		$w->setToggle(new TgLink(new Action('Test')));
		$provider[] = array($w, '<th><a data-order="id" href="?class=Test">#</a></th>', new Context(new HtmlNode('th')));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererColumnText();
	}

}
?>