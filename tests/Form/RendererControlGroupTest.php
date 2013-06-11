<?php
use PHPBootstrap\Widget\Form\Controls\Label;
use PHPBootstrap\Widget\Form\Controls\TextBox;
use PHPBootstrap\Widget\Form\Controls\Help;
use PHPBootstrap\Widget\Form\Controls\ControlGroup;
use PHPBootstrap\Render\Html5\Form\Controls\RendererControlGroup;

require_once 'tests\RendererTest.php';

/**
 * RendererControlGroup test case.
 */
class RendererControlGroupTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new ControlGroup();
		$provider[] = array($w, '<div class="control-group"><div class="controls"></div></div>');
	
		$w = new ControlGroup();
		$w->append(new TextBox('entry'));
		$provider[] = array($w, '<div class="control-group"><div class="controls"><input type="text" id="entry" name="entry" autocomplete="off" data-control="TextBox"></div></div>');
		
		$w = new ControlGroup();
		$w->append(new TextBox('entry'));
		$w->append(new TextBox('entry'));
		$provider[] = array($w, '<div class="control-group"><div class="controls controls-row"><input type="text" id="entry" name="entry" autocomplete="off" data-control="TextBox"><input type="text" id="entry" name="entry" autocomplete="off" data-control="TextBox"></div></div>');
		
		$w = new ControlGroup();
		$w->setLabel(new Label('Label'));
		$provider[] = array($w, '<div class="control-group"><label class="control-label">Label</label><div class="controls"></div></div>');
		
		$w = new ControlGroup();
		$w->setHelp(new Help('Text'));
		$provider[] = array($w, '<div class="control-group"><div class="controls"><span class="help-inline">Text</span></div></div>');
		
		$w = new ControlGroup();
		$w->setSeverity(ControlGroup::Error);
		$provider[] = array($w, '<div class="control-group error"><div class="controls"></div></div>');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererControlGroup();
	}

}
?>