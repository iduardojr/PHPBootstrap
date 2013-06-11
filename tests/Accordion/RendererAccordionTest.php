<?php
use PHPBootstrap\Widget\Accordion\AccordionItem;
use PHPBootstrap\Widget\Accordion\Accordion;
use PHPBootstrap\Render\Html5\Accordion\RendererAccordion;

require_once 'tests\RendererTest.php';

/**
 * RendererAccordion test case.
 */
class RendererAccordionTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Accordion('teste');
		$provider[] = array($w, '<div id="teste" class="accordion"></div>');
		
		$w = new Accordion('teste');
		$w->addItem(new AccordionItem('Teste'));                     
		$provider[] = array($w, '<div id="teste" class="accordion"><div class="accordion-group"><div class="accordion-heading"><a class="accordion-toggle" href="#" data-toggle="collapse" data-target="#collapse-006" data-parent="#teste">Teste</a></div></div></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererAccordion();
	}

}
?>