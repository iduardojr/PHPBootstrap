<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Pagination\Pager;
use PHPBootstrap\Widget\Misc\Badge;
use PHPBootstrap\Widget\Table\ColumnAction;
use PHPBootstrap\Widget\Table\ColumnText;
use PHPBootstrap\Widget\Table\ColumnSelect;
use PHPBootstrap\Widget\Table\Table;
use PHPBootstrap\Render\Html5\Table\RendererTable;
require_once 'tests\RendererTest.php';

/**
 * RendererTable test case.
 */
class RendererTableTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$thead = '<thead><tr></tr></thead>';
		$tbody = '<tbody></tbody>';
		$tfoot = '';
		
		$w = new Table('table', new MockDS(0, 5, 0));
		$provider[0] = array($w, '<table id="table" class="table">' . $thead . $tbody . $tfoot . '</table>');
		
		$w = new Table('table', new MockDS(0, 5, 0));
		$w->setStyle(Table::Bordered);
		$provider[1] = array($w, '<table id="table" class="table table-bordered">' . $thead . $tbody . $tfoot . '</table>');
		
		$w = new Table('table', new MockDS(0, 5, 0));
		$w->setStyle(Table::Bordered);
		$w->setStyle(Table::Striped);
		$class = 'table table-bordered table-condensed';
		$provider[2] = array($w, '<table id="table" class="table table-bordered table-striped">' . $thead . $tbody . $tfoot . '</table>');
		
		$w = new Table('table', new MockDS(0, 5, 0));
		$w->setCaption('Table');
		$provider[5] = array($w, '<table id="table" class="table"><caption>Table</caption>' . $thead . $tbody . $tfoot . '</table>');
		
		$w = new Table('table', new MockDS(0, 5, 0));
		$w->addColumn(new ColumnSelect('id'));
		$w->addColumn(new ColumnText('id', '#'));
		$w->addColumn(new ColumnAction('edit', 'Edit', new TgLink(new Action('Test'))));
		$thead = '<thead><tr>';
		$thead .= '<th style="width: 20px"><input type="checkbox" data-toggle="table-select"></th>';
		$thead .= '<th><span data-order="id">#</span></th>';
		$thead .= '<th class="no-border"></th>';
		$thead .= '</tr></thead>';
		$provider[8] = array($w, '<table id="table" class="table">' . $thead . $tbody . $tfoot . '</table>');
		
		$w = new Table('table', new MockDS(0, 5, 0));
		$w->addColumn(new ColumnSelect('id'));
		$w->addColumn(new ColumnText('id', '#'));
		$w->addColumn(new ColumnAction('edit', 'Edit', new TgLink(new Action('Test'))));
		$w->setAlertNoRecords('No exists records');
		$tbody = '<tbody><tr><td colspan="3">No exists records</td></tr></tbody>';
		$provider[9] = array($w, '<table id="table" class="table">' . $thead . $tbody . $tfoot . '</table>');
		
		$w = new Table('table', new MockDS(0, 5, 0));
		$w->addColumn(new ColumnSelect('id'));
		$w->addColumn(new ColumnText('id', '#'));
		$w->addColumn(new ColumnAction('edit', 'Edit', new TgLink(new Action('Test'))));
		$w->setFooter(new Badge(10));
		$tbody = '<tbody></tbody>';
		$tfoot = '<tfoot><tr class="table-footer"><td colspan="3"><span class="badge">10</span></td></tr></tfoot>';
		$provider[10] = array($w, '<table id="table" class="table">' . $thead . $tbody . $tfoot . '</table>');
		
		$w = new Table('table', new MockDS(0, 5, 0));
		$w->addColumn(new ColumnSelect('id'));
		$w->addColumn(new ColumnText('id', '#'));
		$w->addColumn(new ColumnAction('edit', 'Edit', new TgLink(new Action('Test'))));
		$w->setPaginator(new Pager(new TgLink(new Action('Test')), null));
		$tfoot = '<tfoot><tr class="table-paginator"><td colspan="3"><ul class="pager"><li class="active"><a href="#">01</a></li></ul></td></tr></tfoot>';
		$provider[11] = array($w, '<table id="table" class="table">' . $thead . $tbody . $tfoot . '</table>');
		
		$w = new Table('table', new MockDS(15, 5, 5));
		$w->addColumn(new ColumnSelect('id'));
		$w->addColumn(new ColumnText('id', '#'));
		$w->addColumn(new ColumnAction('edit', 'Edit', new TgLink(new Action('Test'))));
		$w->setPaginator(new Pager(new TgLink(new Action('Test')), null));
		$tbody = '<tbody>';
		for ( $i = 6; $i <= 10; $i++ ) {
			$tbody .= '<tr>';
			$tbody .= '<td><input type="checkbox" name="id[]" value="' . $i . '"></td>';
			$tbody .= '<td><div class="cell">' . $i . '</div></td>';
			$tbody .= '<td class="no-border"><a href="?class=Test&key=' . $i . '" data-column-action="edit">Edit</a></td>';
			$tbody .= '</tr>';
		}
		$tbody .= '</tbody>';
		$tfoot = '<tfoot><tr class="table-paginator"><td colspan="3"><ul class="pager"><li><a href="?class=Test&page=1">01</a></li><li class="active"><a href="#">02</a></li><li><a href="?class=Test&page=3">03</a></li></ul></td></tr></tfoot>';
		$provider[12] = array($w, '<table id="table" class="table">' . $thead . $tbody . $tfoot . '</table>');
		
		$w = new Table('table', new MockDS(15, 5, 5));
		$w->addColumn(new ColumnSelect('id'));
		$w->addColumn(new ColumnText('id', '#'));
		$w->addColumn(new ColumnAction('edit', 'Edit', new TgLink(new Action('Test'))));
		$tfoot = '';
		$w->setContextRow(function ( array $data ) { return $data['id'] == 6 ? Table::Success : ''; });
		$tbody = '<tbody>';
		$tbody .= '<tr class="success">';
		$tbody .= '<td><input type="checkbox" name="id[]" value="6"></td>';
		$tbody .= '<td><div class="cell">6</div></td>';
		$tbody .= '<td class="no-border"><a href="?class=Test&key=6" data-column-action="edit">Edit</a></td>';
		$tbody .= '</tr>';
		for ( $i = 7; $i <= 10; $i++ ) {
			$tbody .= '<tr>';
			$tbody .= '<td><input type="checkbox" name="id[]" value="' . $i . '"></td>';
			$tbody .= '<td><div class="cell">' . $i . '</div></td>';
			$tbody .= '<td class="no-border"><a href="?class=Test&key=' . $i . '" data-column-action="edit">Edit</a></td>';
			$tbody .= '</tr>';
		}
		$tbody .= '</tbody>';
		$provider[13] = array($w, '<table id="table" class="table">' . $thead . $tbody . $tfoot . '</table>');
		
		return $provider;
	}
	
	/**
	 * @dataProvider providerPage
	 */
	public function testCurrentPage( $limit, $offset, $page ) {
		$w = new Table('table', new MockDS(26, $limit, $offset));
		$w->setPaginator(new Pager(new TgLink(new Action('Test'))));
		$w->addColumn(new ColumnText('id', 'Testes'));
		$this->renderer->render($w, new Context());	
		$this->assertEquals($page, $w->getPaginator()->getCurrentPage());
	}
	
	public function providerPage() {
		$provider[] = array(1, 0, 1);
		$provider[] = array(2, 0, 1);
		$provider[] = array(5, 0, 1);
		$provider[] = array(5, 4, 1);
		$provider[] = array(5, 5, 2);
		$provider[] = array(5, 9, 2);
		$provider[] = array(5, 10, 3);
		$provider[] = array(5, 14, 3);
		$provider[] = array(5, 15, 4);
		$provider[] = array(5, 19, 4);
		$provider[] = array(5, 20, 5);
		$provider[] = array(5, 21, 5);
		$provider[] = array(5, 25, 6);
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTable();
	}

}
?>