<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Render\Html5\Pagination\RendererPagination;
use PHPBootstrap\Widget\Pagination\Pagination;
use PHPBootstrap\Widget\Pagination\Paginator;

require_once 'tests\RendererTest.php';

/**
 * RendererPager test case.
 */
class RendererPaginationTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$first = '<li class="page-first disabled"><a href="?class=Test&page=first">&laquo;</a></li>';
		$prev = '';
		$next = '';
		$last = '<li class="page-last disabled"><a href="?class=Test&page=last">&raquo;</a></li>';
		$outer = '<li class="active"><a href="#">01</a></li>';
		
		$w = new Pagination(new TgLink(new Action('Test')), new Paginator(0, 1));
		$provider[] = array($w, '<div class="pagination"><ul>' . $first . $prev . $outer . $next . $last . '</ul></div>');
		
		$w = new Pagination(new TgLink(new Action('Test')), new Paginator(0, 1));
		$w->setAlign(Pagination::Center);
		$provider[] = array($w, '<div class="pagination pagination-centered"><ul>' . $first . $prev . $outer . $next . $last . '</ul></div>');
		
		$w = new Pagination(new TgLink(new Action('Test')), new Paginator(0, 1));
		$w->setSize(Pagination::Small);
		$provider[] = array($w, '<div class="pagination pagination-small"><ul>' . $first . $prev . $outer . $next . $last . '</ul></div>');
		
		$w = new Pagination(new TgLink(new Action('Test')), new Paginator(0, 1));
		$w->setName('pager');
		$provider[] = array($w, '<div id="pager" class="pagination"><ul>' . $first . $prev . $outer . $next . $last . '</ul></div>');

		$w = new Pagination(new TgLink(new Action('Test')), new Paginator(0, 1));
		$w->setLabel('First', 'Prev', 'Next', 'Last');
		$first = '<li class="page-first disabled"><a href="?class=Test&page=first">First</a></li>';
		$prev = '<li class="page-prev disabled"><a href="?class=Test&page=prev">Prev</a></li>';
		$next = '<li class="page-next disabled"><a href="?class=Test&page=next">Next</a></li>';
		$last = '<li class="page-last disabled"><a href="?class=Test&page=last">Last</a></li>';
		$provider[] = array($w, '<div class="pagination"><ul>' . $first . $prev . $outer . $next . $last . '</ul></div>');
		
		$w = new Pagination(new TgLink(new Action('Test')), new Paginator(3, 1));
		$w->setLabel('First', 'Prev', 'Next', 'Last');
		$next = '<li class="page-next"><a href="?class=Test&page=next">Next</a></li>';
		$last = '<li class="page-last"><a href="?class=Test&page=last">Last</a></li>';
		$outer = '<li class="active"><a href="#">01</a></li><li><a href="?class=Test&page=2">02</a></li><li><a href="?class=Test&page=3">03</a></li>';
		$provider[] = array($w, '<div class="pagination"><ul>' . $first . $prev . $outer . $next . $last . '</ul></div>');
		
		$w = new Pagination(new TgLink(new Action('Test')), new Paginator(3, 2));
		$w->setLabel('First', 'Prev', 'Next', 'Last');
		$outer = '<li class="active"><a href="#">01</a></li><li><a href="?class=Test&page=2">02</a></li>';
		$provider[] = array($w, '<div class="pagination"><ul>' . $first . $prev . $outer . $next . $last . '</ul></div>');
		
		$w = new Pagination(new TgLink(new Action('Test')), new Paginator(3, 1, 2));
		$w->setLabel('First', 'Prev', 'Next', 'Last');
		$first = '<li class="page-first"><a href="?class=Test&page=first">First</a></li>';
		$prev = '<li class="page-prev"><a href="?class=Test&page=prev">Prev</a></li>';
		$outer = '<li><a href="?class=Test&page=1">01</a></li><li class="active"><a href="#">02</a></li><li><a href="?class=Test&page=3">03</a></li>';
		$provider[] = array($w, '<div class="pagination"><ul>' . $first . $prev . $outer . $next . $last . '</ul></div>');
		
		$w = new Pagination(new TgLink(new Action('Test')), new Paginator(3, 1, 3));
		$w->setLabel('First', 'Prev', 'Next', 'Last');
		$outer = '<li><a href="?class=Test&page=1">01</a></li><li><a href="?class=Test&page=2">02</a></li><li class="active"><a href="#">03</a></li>';
		$next = '<li class="page-next disabled"><a href="?class=Test&page=next">Next</a></li>';
		$last = '<li class="page-last disabled"><a href="?class=Test&page=last">Last</a></li>';
		$provider[] = array($w, '<div class="pagination"><ul>' . $first . $prev . $outer . $next . $last . '</ul></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererPagination();
	}

}
?>