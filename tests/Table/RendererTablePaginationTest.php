<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Pagination\Pager;
use PHPBootstrap\Widget\Table\TablePagination;
use PHPBootstrap\Render\Html5\Table\RendererTablePagination;
use PHPBootstrap\Widget\Pagination\Paginator;
use PHPBootstrap\Widget\Pagination\Scrolling\All;
require_once 'tests\RendererTest.php';

/**
 * RendererTablePagination test case.
 */
class RendererTablePaginationTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$limit = '';
		$pager = '<ul class="pager"><li class="active"><a href="#">01</a></li></ul>';
		$label = '<div class="label"><span class="first">0</span> - <span class="last">0</span> de <span class="total">0</span></div><div class="loading"></div>';
		
		$w = new TablePagination(new Pager(new TgLink(new Action('Test')), new Paginator(0, 1), new All()));
		$provider[] = array($w, '<div class="table-pagination form-actions">' . $label . $limit . $pager . '</div>');
		
		$w = new TablePagination(new Pager(new TgLink(new Action('Test')), new Paginator(0, 1), new All()));
		$w->setName('pager');
		$provider[] = array($w, '<div id="pager" class="table-pagination form-actions">' . $label . $limit . $pager . '</div>');
		
		$w = new TablePagination(new Pager(new TgLink(new Action('Test')), new Paginator(10, 10), new All()));
		$label = '<div class="label"><span class="first">1</span> - <span class="last">10</span> de <span class="total">10</span></div><div class="loading"></div>';
		$provider[] = array($w, '<div class="table-pagination form-actions">' . $label . $limit . $pager . '</div>');
		
		$w = new TablePagination(new Pager(new TgLink(new Action('Test')), new Paginator(0, 1), new All()));
		$w->setLimits(new TgLink(new Action('Test')), 10, 20);
		$label = '<div class="label"><span class="first">0</span> - <span class="last">0</span> de <span class="total">0</span></div><div class="loading"></div>';
		$limit = '<div class="limit">Por p&aacute;gina:<a href="?class=Test&limit=10" class="badge">10</a><a href="?class=Test&limit=20" class="badge">20</a></div>';
		$provider[] = array($w, '<div class="table-pagination form-actions">' . $label . $limit . $pager . '</div>');
		
		$w = new TablePagination(new Pager(new TgLink(new Action('Test')), new Paginator(0, 10), new All()));
		$w->setLimits(new TgLink(new Action('Test')), 10, 20);
		$limit = '<div class="limit">Por p&aacute;gina:<a href="?class=Test&limit=10" class="badge badge-important">10</a><a href="?class=Test&limit=20" class="badge">20</a></div>';
		$provider[] = array($w, '<div class="table-pagination form-actions">' . $label . $limit . $pager . '</div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTablePagination();
	}

}
?>