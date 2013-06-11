<?php
use PHPBootstrap\Widget\Misc\Descriptions;
use PHPBootstrap\Render\Html5\Misc\RendererDescriptions;

require_once 'tests\RendererTest.php';

/**
 * RendererDescriptions test case.
 */
class RendererDescriptionsTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Descriptions('test');
		$provider[] = array($w, '<dl id="test"></dl>');
		
		$w = new Descriptions('test');
		$w->setHorizontal(true);
		$provider[] = array($w, '<dl id="test" class="dl-horizontal"></dl>');
		
		$w = new Descriptions('test');
		$w->addTerm('Euismod', 'Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.');
		$provider[] = array($w, '<dl id="test"><dt>Euismod</dt><dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd></dl>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDescriptions();
	}

}
?>