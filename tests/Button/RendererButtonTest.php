<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Dropdown\Dropdown;
use PHPBootstrap\Widget\Dropdown\TgDropdown;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Render\Html5\Button\RendererButton;

require_once 'tests\RendererTest.php';

/**
 * RendererButton test case.
 */
class RendererButtonTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Button('Save');
		$provider[] = array($w, '<button type="button" class="btn">Save</button>');
		
		$w = new Button('Save');
		$w->setName('bt');
		$provider[] = array($w, '<button id="bt" type="button" class="btn">Save</button>');
		
		$w = new Button('Save');
		$w->setIcon(new Icon('icon-remove'));
		$provider[] = array($w, '<button type="button" class="btn"><i class="icon-remove"></i>Save</button>');
		
		$w = new Button('Save');
		$w->setStyle(Button::Primary);
		$provider[] = array($w, '<button type="button" class="btn btn-primary">Save</button>');
		
		$w = new Button('Save');
		$w->setSize(Button::Large);
		$provider[] = array($w, '<button type="button" class="btn btn-large">Save</button>');
		
		$w = new Button('Save');
		$w->setBlock(true);
		$provider[] = array($w, '<button type="button" class="btn btn-block">Save</button>');
		
		$w = new Button('Save');
		$w->setDisabled(true);
		$provider[] = array($w, '<button type="button" class="btn disabled" disabled="disabled">Save</button>');
		
		$w = new Button('Save');
		$w->setToggle(new TgLink(new Action('Test')));
		$provider[] = array($w, '<a class="btn" href="?class=Test">Save</a>');
		
		$w = new Button('Save');
		$w->setToggle(new TgDropdown(new Dropdown()));
		$provider[] = array($w, '<div class="btn-group"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown">Save<span class="caret"></span></button><ul class="dropdown-menu"></ul></div>');
		
		$w = new Button('Save');
		$w->setTooltip(new Tooltip('Title'));
		$provider[] = array($w, '<button type="button" class="btn" rel="tooltip" title="Title">Save</button>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererButton();
	}

}
?>