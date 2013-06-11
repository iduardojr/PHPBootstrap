<?php
use PHPBootstrap\Widget\Action\Action;

use PHPBootstrap\Widget\Action\TgLink;

use PHPBootstrap\Widget\Dropdown\Dropdown;
use PHPBootstrap\Widget\Dropdown\TgDropdown;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Widget\Dropdown\DropdownLink;
use PHPBootstrap\Render\Html5\Dropdown\RendererDropdownLink;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererDropdownLink test case.
 */
class RendererDropdownLinkTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new DropdownLink('Action');
		$provider[] = array($w, '<li><a href="#">Action</a></li>', new Context(new HtmlNode('li')));
		
		$w = new DropdownLink('Action');
		$w->setIcon(new Icon('icon-remove'));
		$provider[] = array($w, '<li><a href="#"><i class="icon-remove"></i>Action</a></li>', new Context(new HtmlNode('li')));
		
		$w = new DropdownLink('Action');
		$w->setDisabled(true);
		$provider[] = array($w, '<li class="disabled"><a href="#">Action</a></li>', new Context(new HtmlNode('li')));
		
		$w = new DropdownLink('Action');
		$w->setTooltip(new Tooltip('title'));
		$provider[] = array($w, '<li><a href="#" rel="tooltip" title="title">Action</a></li>', new Context(new HtmlNode('li')));
		
		$w = new DropdownLink('Action');
		$w->setToggle(new TgLink(new Action('Test')));
		$provider[] = array($w, '<li><a href="?class=Test">Action</a></li>', new Context(new HtmlNode('li')));
		
		$w = new DropdownLink('Action');
		$w->setToggle(new TgDropdown(new Dropdown()));
		$provider[] = array($w, '<li class="dropdown-submenu"><a href="#">Action</a><ul class="dropdown-menu"></ul></li>', new Context(new HtmlNode('li')));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDropdownLink();
	}

}
?>