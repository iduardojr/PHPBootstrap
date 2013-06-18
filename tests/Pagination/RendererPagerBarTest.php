<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Pagination\PagerBar;
use PHPBootstrap\Render\Html5\Pagination\RendererPagerBar;
use PHPBootstrap\Widget\Pagination\Paginator;

require_once 'tests\RendererTest.php';

/**
 * RendererPagerBar test case.
 */
class RendererPagerBarTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$first = '<li class="page-first disabled"><a href="?class=Test&page=first"><i class="ui-icon-seek-first"></i></a></li>';
		$prev = '<li class="page-prev disabled"><a href="?class=Test&page=prev"><i class="ui-icon-seek-prev"></i></a></li>';
		$next = '<li class="page-next disabled"><a href="?class=Test&page=next"><i class="ui-icon-seek-next"></i></a></li>';
		$last = '<li class="page-last disabled"><a href="?class=Test&page=last"><i class="ui-icon-seek-end"></i></a></li>';
		$current = 1;
		$total = 1;
		$outer = '<li><input type="text" class="span1 current" value="%s"></li><li> / </li><li><input type="text" class="span1 total" disabled="disabled" value="%s"></li>';
		$template = '<li class="current-change"><a href="?class=Test&page=#CURRENT#"></a></li>';
		
		$w = new PagerBar(new TgLink(new Action('Test')), new Paginator(0, 1));
		$provider[] = array($w, '<div class="pager-bar"><ul>' . $template . $first . $prev . sprintf($outer, $current, $total) . $next . $last . '</ul></div>');
		
		$w = new PagerBar(new TgLink(new Action('Test')), new Paginator(0, 1));
		$w->setName('pager');
		$provider[] = array($w, '<div id="pager" class="pager-bar"><ul>' . $template . $first . $prev . sprintf($outer, $current, $total) . $next . $last . '</ul></div>');

		$w = new PagerBar(new TgLink(new Action('Test')), new Paginator(3, 1));
		$total = 3;
		$next = '<li class="page-next"><a href="?class=Test&page=next"><i class="ui-icon-seek-next"></i></a></li>';
		$last = '<li class="page-last"><a href="?class=Test&page=last"><i class="ui-icon-seek-end"></i></a></li>';
		$provider[] = array($w, '<div class="pager-bar"><ul>' . $template . $first . $prev . sprintf($outer, $current, $total) . $next . $last . '</ul></div>');
		
		$w = new PagerBar(new TgLink(new Action('Test')), new Paginator(3, 1, 2));
		$current = 2;
		$first = '<li class="page-first"><a href="?class=Test&page=first"><i class="ui-icon-seek-first"></i></a></li>';
		$prev = '<li class="page-prev"><a href="?class=Test&page=prev"><i class="ui-icon-seek-prev"></i></a></li>';
		$provider[] = array($w, '<div class="pager-bar"><ul>' . $template . $first . $prev . sprintf($outer, $current, $total) . $next . $last . '</ul></div>');
		
		$w = new PagerBar(new TgLink(new Action('Test')), new Paginator(3, 1, 3));
		$current = 3;
		$next = '<li class="page-next disabled"><a href="?class=Test&page=next"><i class="ui-icon-seek-next"></i></a></li>';
		$last = '<li class="page-last disabled"><a href="?class=Test&page=last"><i class="ui-icon-seek-end"></i></a></li>';
		$provider[] = array($w, '<div class="pager-bar"><ul>' . $template . $first . $prev . sprintf($outer, $current, $total) . $next . $last . '</ul></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererPagerBar();
	}

}
?>