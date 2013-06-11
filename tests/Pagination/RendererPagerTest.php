<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Render\Html5\Pagination\RendererPager;
use PHPBootstrap\Widget\Pagination\Pager;

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
		
		$w = new Pager(new TgLink(new Action('Test')));
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		$w = new Pager(new TgLink(new Action('Test')));
		$w->setName('pager');
		$provider[] = array($w, '<ul id="pager" class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');

		$w = new Pager(new TgLink(new Action('Test')));
		$w->setLabelPages('First', 'Prev', 'Next', 'Last');
		$first = '<li class="page-first previous disabled"><a href="?class=Test&page=first">First</a></li>';
		$prev = '<li class="page-prev disabled"><a href="?class=Test&page=prev">Prev</a></li>';
		$next = '<li class="page-next disabled"><a href="?class=Test&page=next">Next</a></li>';
		$last = '<li class="page-last next disabled"><a href="?class=Test&page=last">Last</a></li>';
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		$w = new Pager(new TgLink(new Action('Test')));
		$w->setLabelPages('First', 'Prev', 'Next', 'Last');
		$w->setTotalRecords(3);
		$next = '<li class="page-next"><a href="?class=Test&page=next">Next</a></li>';
		$last = '<li class="page-last next"><a href="?class=Test&page=last">Last</a></li>';
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		$w = new Pager(new TgLink(new Action('Test')));
		$w->setLabelPages('First', 'Prev', 'Next', 'Last');
		$w->setTotalRecords(3);
		$w->setLimitPages(null);
		$outer = '<li class="active"><a href="#">01</a></li><li><a href="?class=Test&page=2">02</a></li><li><a href="?class=Test&page=3">03</a></li>';
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		$w = new Pager(new TgLink(new Action('Test')));
		$w->setLabelPages('First', 'Prev', 'Next', 'Last');
		$w->setTotalRecords(3);
		$w->setLimitPages(2);
		$outer = '<li class="active"><a href="#">01</a></li><li><a href="?class=Test&page=2">02</a></li>';
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		$w = new Pager(new TgLink(new Action('Test')));
		$w->setLabelPages('First', 'Prev', 'Next', 'Last');
		$w->setTotalRecords(3);
		$w->setCurrentPage(2);
		$w->setLimitPages(2);
		$first = '<li class="page-first previous"><a href="?class=Test&page=first">First</a></li>';
		$prev = '<li class="page-prev"><a href="?class=Test&page=prev">Prev</a></li>';
		$outer = '<li class="active"><a href="#">02</a></li><li><a href="?class=Test&page=3">03</a></li>';
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		$w = new Pager(new TgLink(new Action('Test')));
		$w->setLabelPages('First', 'Prev', 'Next', 'Last');
		$w->setTotalRecords(3);
		$w->setCurrentPage(3);
		$w->setLimitPages(2);
		$outer = '<li><a href="?class=Test&page=2">02</a></li><li class="active"><a href="#">03</a></li>';
		$next = '<li class="page-next disabled"><a href="?class=Test&page=next">Next</a></li>';
		$last = '<li class="page-last next disabled"><a href="?class=Test&page=last">Last</a></li>';
		$provider[] = array($w, '<ul class="pager">' . $first . $prev . $outer . $next . $last . '</ul>');
		
		return $provider;
	}
	
	/**
	 * 
	 * @dataProvider providerRanger
	 */
	public function testGetRangeOfPages($c, $s, $e, $l ) {
		$pager = new Pager(new TgLink(new Action('Test')));
		$pager->setTotalRecords(10);
		$pager->setLimitPages($l);
		$pager->setCurrentPage($c);
		
		$range = $pager->getRangeOfPages();
		$this->assertEquals($s, $range->start, 'Start: ' . $s . ' x ' . $range->start);
		$this->assertEquals($e, $range->end, 'End: ' . $e . ' x ' . $range->end);
	}
	
	public function providerRanger() {
		$provider[] = array(1, 1, 1, 1);
		$provider[] = array(2, 2, 2, 1);
		$provider[] = array(3, 3, 3, 1);
		$provider[] = array(4, 4, 4, 1);
		$provider[] = array(9, 9, 9, 1);
		$provider[] = array(10, 10, 10, 1);
		
		$provider[] = array(1, 1, 2, 2);
		$provider[] = array(2, 2, 3, 2);
		$provider[] = array(3, 3, 4, 2);
		$provider[] = array(4, 4, 5, 2);
		$provider[] = array(9, 9, 10, 2);
		$provider[] = array(10, 9, 10, 2);
		
		$provider[] = array(1, 1, 3, 3);
		$provider[] = array(2, 1, 3, 3);
		$provider[] = array(3, 2, 4, 3);
		$provider[] = array(4, 3, 5, 3);
		$provider[] = array(8, 7, 9, 3);
		$provider[] = array(9, 8, 10, 3);
		$provider[] = array(10, 8, 10, 3);
		
		$provider[] = array(1, 1, 4, 4);
		$provider[] = array(2, 1, 4, 4);
		$provider[] = array(3, 2, 5, 4);
		$provider[] = array(4, 3, 6, 4);
		$provider[] = array(5, 4, 7, 4);
		$provider[] = array(6, 5, 8, 4);
		$provider[] = array(7, 6, 9, 4);
		$provider[] = array(8, 7, 10, 4);
		$provider[] = array(9, 7, 10, 4);
		$provider[] = array(10, 7, 10, 4);
		
		$provider[] = array(1, 1, 5, 5);
		$provider[] = array(2, 1, 5, 5);
		$provider[] = array(3, 1, 5, 5);
		$provider[] = array(4, 2, 6, 5);
		$provider[] = array(5, 3, 7, 5);
		$provider[] = array(6, 4, 8, 5);
		$provider[] = array(7, 5, 9, 5);
		$provider[] = array(8, 6, 10, 5);
		$provider[] = array(9, 6, 10, 5);
		$provider[] = array(10, 6, 10, 5);
		
		$provider[] = array(1, 1, 6, 6);
		$provider[] = array(2, 1, 6, 6);
		$provider[] = array(3, 1, 6, 6);
		$provider[] = array(4, 2, 7, 6);
		$provider[] = array(5, 3, 8, 6);
		$provider[] = array(6, 4, 9, 6);
		$provider[] = array(7, 5, 10, 6);
		$provider[] = array(8, 5, 10, 6);
		$provider[] = array(9, 5, 10, 6);
		$provider[] = array(10, 5, 10, 6);
		
		$provider[] = array(1, 1, 10, 10);
		$provider[] = array(2, 1, 10, 10);
		$provider[] = array(10, 1, 10, 10);
		
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