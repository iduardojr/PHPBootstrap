<?php
use PHPBootstrap\Widget\Dropdown\DropdownHeader;
use PHPBootstrap\Widget\Dropdown\DropdownDivider;
use PHPBootstrap\Render\Html5\Dropdown\RendererDropdown;
use PHPBootstrap\Widget\Dropdown\DropdownLink;
use PHPBootstrap\Widget\Dropdown\Dropdown;

require_once 'tests\RendererTest.php';

/**
 * RendererDropdown test case.
 */
class RendererDropdownTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Dropdown();
		$provider[] = array($w, '<ul class="dropdown-menu"></ul>');
		
		$w = new Dropdown();
		$w->setAlign(Dropdown::Right);
		$provider[] = array($w, '<ul class="dropdown-menu pull-right"></ul>');
		
		$w = new Dropdown();
		$w->setName('dropdown');
		$provider[] = array($w, '<ul id="dropdown" class="dropdown-menu"></ul>');
		
		$w = new Dropdown();
		$w->addItem(new DropdownLink('Teste'));
		$provider[] = array($w, '<ul class="dropdown-menu"><li><a href="#">Teste</a></li></ul>');
		
		$w = new Dropdown();
		$w->addItem(new DropdownDivider());
		$provider[] = array($w, '<ul class="dropdown-menu"><li class="divider"></li></ul>');
		
		$w = new Dropdown();
		$w->addItem(new DropdownHeader('header'));
		$provider[] = array($w, '<ul class="dropdown-menu"><li class="nav-header">header</li></ul>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDropdown();
	}

}
?>