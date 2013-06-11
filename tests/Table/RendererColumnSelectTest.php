<?php
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Table\Table;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\Table\RendererColumnSelect;
use PHPBootstrap\Widget\Table\ColumnSelect;
require_once 'tests\RendererTest.php';

/**
 * RendererColumnSelect test case.
 */
class RendererColumnSelectTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new ColumnSelect('select');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$provider[] = array($w, '<th style="width: 20px"><input type="checkbox" data-toggle="table-select"></th>', new Context(new HtmlNode('th')));
		$provider[] = array($w, '<td><input type="checkbox" name="select[]" value="1"></td>', new Context(new HtmlNode('td')));
		
		$w = new ColumnSelect('select');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setSpan(2);
		$provider[] = array($w, '<th class="span2"><input type="checkbox" data-toggle="table-select"></th>', new Context(new HtmlNode('th')));
		
		$w = new ColumnSelect('select');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setLabel('Select');
		$provider[] = array($w, '<th style="width: 20px"><a href="#" data-toggle="table-select">Select</a></th>', new Context(new HtmlNode('th')));
		
		$w = new ColumnSelect('select');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setForm(new Form('test'));
		$provider[] = array($w, '<td><input type="checkbox" name="select[]" form="test" value="1"></td>', new Context(new HtmlNode('td')));
		
		$w = new ColumnSelect('select');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setContextEnabled( function ( array $data ) { return ! $data['status']; });
		$provider[] = array($w, '<td><input type="checkbox" name="select[]" disabled="disabled" value="1"></td>', new Context(new HtmlNode('td')));	
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererColumnSelect();
	}

}
?>