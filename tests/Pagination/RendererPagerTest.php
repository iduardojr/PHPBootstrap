<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Render\Html5\Pagination\RendererPager;
use PHPBootstrap\Widget\Pagination\Pager;
use PHPBootstrap\Widget\Pagination\Paginator;
use PHPBootstrap\Widget\Pagination\Scrolling\All;

require_once 'tests\RendererTest.php';

/**
 * RendererPager test case.
 */
class RendererPagerTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$first = '';
		$prev = '';
		$next = '';
		$last = '';
		$outer = '';
		
		$w = new Pager(new TgLink(new Action('Test')), new Paginator(0, 1));
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		$w = new Pager(new TgLink(new Action('Test')), new Paginator(0, 1));
		$w->setName('pager');
		$provider[] = array($w, '<ul id="pager" class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');

		$w = new Pager(new TgLink(new Action('Test')), new Paginator(0, 1));
		$w->setLabel('First', 'Prev', 'Next', 'Last');
		$first = '<li class="page-first previous disabled"><a href="?class=Test&page=first">First</a></li>';
		$prev = '<li class="page-prev disabled"><a href="?class=Test&page=prev">Prev</a></li>';
		$next = '<li class="page-next disabled"><a href="?class=Test&page=next">Next</a></li>';
		$last = '<li class="page-last next disabled"><a href="?class=Test&page=last">Last</a></li>';
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		$w = new Pager(new TgLink(new Action('Test')), new Paginator(3, 1));
		$w->setLabel('First', 'Prev', 'Next', 'Last');
		$next = '<li class="page-next"><a href="?class=Test&page=next">Next</a></li>';
		$last = '<li class="page-last next"><a href="?class=Test&page=last">Last</a></li>';
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		$w = new Pager(new TgLink(new Action('Test')), new Paginator(3, 1), new All());
		$w->setLabel('First', 'Prev', 'Next', 'Last');
		$outer = '<li class="active"><a href="#">01</a></li><li><a href="?class=Test&page=2">02</a></li><li><a href="?class=Test&page=3">03</a></li>';
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		$w = new Pager(new TgLink(new Action('Test')), new Paginator(3, 2), new All());
		$w->setLabel('First', 'Prev', 'Next', 'Last');
		$outer = '<li class="active"><a href="#">01</a></li><li><a href="?class=Test&page=2">02</a></li>';
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		$w = new Pager(new TgLink(new Action('Test')), new Paginator(3, 1, 2), new All());
		$w->setLabel('First', 'Prev', 'Next', 'Last');
		$first = '<li class="page-first previous"><a href="?class=Test&page=first">First</a></li>';
		$prev = '<li class="page-prev"><a href="?class=Test&page=prev">Prev</a></li>';
		$outer = '<li><a href="?class=Test&page=1">01</a></li><li class="active"><a href="#">02</a></li><li><a href="?class=Test&page=3">03</a></li>';
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		$w = new Pager(new TgLink(new Action('Test')), new Paginator(3, 1, 3), new All());
		$w->setLabel('First', 'Prev', 'Next', 'Last');
		$outer = '<li><a href="?class=Test&page=1">01</a></li><li><a href="?class=Test&page=2">02</a></li><li class="active"><a href="#">03</a></li>';
		$next = '<li class="page-next disabled"><a href="?class=Test&page=next">Next</a></li>';
		$last = '<li class="page-last next disabled"><a href="?class=Test&page=last">Last</a></li>';
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererPager();
	}

}
?>