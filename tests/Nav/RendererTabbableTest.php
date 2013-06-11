<?php
use PHPBootstrap\Widget\Tab\TgTab;
use PHPBootstrap\Widget\Nav\NavLink;
use PHPBootstrap\Render\Html5\Nav\RendererTabbable;
use PHPBootstrap\Widget\Dropdown\TgDropdown;
use PHPBootstrap\Widget\Dropdown\DropdownLink;
use PHPBootstrap\Widget\Dropdown\Dropdown;
use PHPBootstrap\Widget\Nav\TabPane;
use PHPBootstrap\Widget\Nav\Tabbable;

require_once 'tests\RendererTest.php';

/**
 * RendererTabbable test case.
 */
class RendererTabbableTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Tabbable('tabs');
		$provider[] = array($w, '<div id="tabs" class="tabbable"><ul class="nav nav-tabs"></ul><div class="tab-content"></div></div>');
		
		$w = new Tabbable('tabs');
		$w->setPlacement(Tabbable::Below);
		$provider[] = array($w, '<div id="tabs" class="tabbable tabs-below"><div class="tab-content"></div><ul class="nav nav-tabs"></ul></div>');
		
		$w = new Tabbable('tabs');
		$w->addItem(new NavLink('Test'), null, new TabPane('teste'));
		$provider[] = array($w, '<div id="tabs" class="tabbable"><ul class="nav nav-tabs"><li class="active"><a href="#" data-toggle="tab" data-target="#tabpane-001">Test</a></li></ul><div class="tab-content"><div id="tabpane-001" class="tab-pane active">teste</div></div></div>');
		
		$w = new Tabbable('tabs');
		$tab1 = new TabPane('teste');
		$tab2 = new TabPane('teste');
		$drop = new Dropdown();
		$drop->addItem(new DropdownLink('t1', new TgTab($tab1)));
		$drop->addItem(new DropdownLink('t2', new TgTab($tab2)));
		$w->addItem(new NavLink('Dropdown', new TgDropdown($drop)), null, $tab1, $tab2);
		$provider[] = array($w, '<div id="tabs" class="tabbable"><ul class="nav nav-tabs"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<span class="caret"></span></a><ul class="dropdown-menu"><li><a href="#" data-toggle="tab" data-target="#tabpane-002">t1</a></li><li><a href="#" data-toggle="tab" data-target="#tabpane-003">t2</a></li></ul></li></ul><div class="tab-content"><div id="tabpane-002" class="tab-pane">teste</div><div id="tabpane-003" class="tab-pane">teste</div></div></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTabbable();
	}

}
?>