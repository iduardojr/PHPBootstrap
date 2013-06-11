<?php
use PHPBootstrap\Widget\Misc\Paragraph;

use PHPBootstrap\Widget\Collapse\TgCollapse;
use PHPBootstrap\Widget\Accordion\AccordionItem;
use PHPBootstrap\Render\Html5\Accordion\RendererAccordionItem;

require_once 'tests\RendererTest.php';

/**
 * RendererAccordionItem test case.
 */
class RendererAccordionItemTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new AccordionItem('Teste');
		$provider[] = array($w, '<div class="accordion-group"><div class="accordion-heading"><a class="accordion-toggle" href="#">Teste</a></div></div>');
		
		$w = new AccordionItem('Teste');
		$w->setName('accordion');
		$provider[] = array($w, '<div id="accordion" class="accordion-group"><div class="accordion-heading"><a class="accordion-toggle" href="#">Teste</a></div></div>');
		
		$w = new AccordionItem('Teste');
		$w->setBody(new Paragraph('teste'));
		$provider[] = array($w, '<div class="accordion-group"><div class="accordion-heading"><a class="accordion-toggle" href="#">Teste</a></div><div id="collapse-003" class="accordion-body collapse"><div class="accordion-inner"><p>teste</p></div></div></div>');
		
		$w = new AccordionItem('Teste');
		$w->setBody(new Paragraph('teste'));
		$w->setOpen(true);
		$provider[] = array($w, '<div class="accordion-group"><div class="accordion-heading"><a class="accordion-toggle" href="#">Teste</a></div><div id="collapse-004" class="accordion-body collapse in"><div class="accordion-inner"><p>teste</p></div></div></div>');
		
		$w = new AccordionItem('Teste');
		$w->setBody(new Paragraph('teste'));
		$w->setToggle(new TgCollapse($w));
		$provider[] = array($w, '<div class="accordion-group"><div class="accordion-heading"><a class="accordion-toggle" href="#" data-toggle="collapse" data-target="#collapse-005">Teste</a></div><div id="collapse-005" class="accordion-body collapse"><div class="accordion-inner"><p>teste</p></div></div></div>');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererAccordionItem();
	}

}
?>