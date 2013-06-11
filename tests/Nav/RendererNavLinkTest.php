<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Dropdown\Dropdown;
use PHPBootstrap\Widget\Dropdown\TgDropdown;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Widget\Nav\NavLink;
use PHPBootstrap\Render\Html5\Nav\RendererNavLink;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererNavLink test case.
 */
class RendererNavLinkTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new NavLink('Action');
		$provider[] = array($w, '<li><a href="#">Action</a></li>', new Context(new HtmlNode('li')));
		
		$w = new NavLink('Action');
		$w->setIcon(new Icon('icon-remove'));
		$provider[] = array($w, '<li><a href="#"><i class="icon-remove"></i>Action</a></li>', new Context(new HtmlNode('li')));
		
		$w = new NavLink('Action');
		$w->setDisabled(true);
		$provider[] = array($w, '<li class="disabled"><a href="#">Action</a></li>', new Context(new HtmlNode('li')));
		
		$w = new NavLink('Action');
		$w->setTooltip(new Tooltip('title'));
		$provider[] = array($w, '<li><a href="#" rel="tooltip" title="title">Action</a></li>', new Context(new HtmlNode('li')));
		
		$w = new NavLink('Action');
		$w->setToggle(new TgLink(new Action('Test')));
		$provider[] = array($w, '<li><a href="?class=Test">Action</a></li>', new Context(new HtmlNode('li')));
		
		$w = new NavLink('Action');
		$w->setToggle(new TgDropdown(new Dropdown()));
		$provider[] = array($w, '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Action<span class="caret"></span></a><ul class="dropdown-menu"></ul></li>', new Context(new HtmlNode('li')));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererNavLink();
	}

}
?>