<?php
use PHPBootstrap\Widget\Dropdown\Dropdown;
use PHPBootstrap\Widget\Dropdown\TgDropdown;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Button\ButtonGroup;
use PHPBootstrap\Render\Html5\Button\RendererButtonGroup;

require_once 'tests\RendererTest.php';

/**
 * RendererButtonGroup test case.
 */
class RendererButtonGroupTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new ButtonGroup();
		$provider[] = array($w, '<div class="btn-group"></div>');
		
		$w = new ButtonGroup();
		$w->setName('group');
		$provider[] = array($w, '<div id="group" class="btn-group"></div>');
		
		$w = new ButtonGroup();
		$w->setVertical(true);
		$provider[] = array($w, '<div class="btn-group btn-group-vertical"></div>');
		
		$w = new ButtonGroup();
		$w->addButton(new Button('Save'));
		$provider[] = array($w, '<div class="btn-group"><button type="button" class="btn">Save</button></div>');
		
		$w = new ButtonGroup();
		$w->addButton(new Button('', new TgDropdown(new Dropdown())));
		$provider[] = array($w, '<div class="btn-group"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button><ul class="dropdown-menu"></ul></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererButtonGroup();
	}

}
?>