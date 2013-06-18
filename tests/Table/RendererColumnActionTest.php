<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Widget\Table\ColumnAction;
use PHPBootstrap\Render\Html5\Table\RendererColumnAction;
use PHPBootstrap\Widget\Table\Table;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
require_once 'tests\RendererTest.php';

/**
 * RendererColumnAction test case.
 */
class RendererColumnActionTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new ColumnAction('edit', 'Edit');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$provider[] = array($w, '<th class="no-border"></th>', new Context(new HtmlNode('th')));
		$provider[] = array($w, '<td class="no-border"><a href="#" data-column-action="edit">Edit</a></td>', new Context(new HtmlNode('td')));
		
		$w = new ColumnAction('edit', 'Edit', new TgLink(new Action('Test')));
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$provider[] = array($w, '<th class="no-border"></th>', new Context(new HtmlNode('th')));
		$provider[] = array($w, '<td class="no-border"><a href="?class=Test&key=1" data-column-action="edit">Edit</a></td>', new Context(new HtmlNode('td')));
		
		$w = new ColumnAction('edit', 'Edit');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setSpan(2);
		$provider[] = array($w, '<th class="no-border span2"></th>', new Context(new HtmlNode('th')));
		
		$w = new ColumnAction('edit', 'Edit');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setIcon(new Icon('icon-pencil'));
		$provider[] = array($w, '<td class="no-border"><a href="#" data-column-action="edit"><i class="icon-pencil"></i>Edit</a></td>', new Context(new HtmlNode('td')));
		
		$w = new ColumnAction('edit', 'Edit');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setSize(Button::Mini);
		$provider[] = array($w, '<td class="no-border"><a href="#" data-column-action="edit">Edit</a></td>', new Context(new HtmlNode('td')));
		
		$w = new ColumnAction('edit', 'Edit');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setStyle(Button::Danger);
		$w->setSize(Button::Mini);
		$provider[] = array($w, '<td class="no-border"><a href="#" class="btn btn-mini btn-danger" data-column-action="edit">Edit</a></td>', new Context(new HtmlNode('td')));
		
		$w = new ColumnAction('edit', 'Edit');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setContext( function ( Button $button, array $data ) { $button->setDisabled( $data['status']); });
		$provider[] = array($w, '<td class="no-border"><a href="#" class="disabled" data-column-action="edit">Edit</a></td>', new Context(new HtmlNode('td')));
		
		$w = new ColumnAction('edit', 'Edit');
		$w->setTable(new Table('dt', new MockDS(10, 5, 1)));
		$w->setTooltip(new Tooltip('Title'));
		$provider[] = array($w, '<td class="no-border"><a href="#" rel="tooltip" title="Title" data-column-action="edit">Edit</a></td>', new Context(new HtmlNode('td')));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererColumnAction();
	}

}
?>