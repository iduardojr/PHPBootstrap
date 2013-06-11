<?php
use PHPBootstrap\Widget\Misc\Title;
use PHPBootstrap\Widget\Misc\HeroUnit;
use PHPBootstrap\Render\Html5\Misc\RendererHeroUnit;

require_once 'tests\RendererTest.php';

/**
 * RendererHeroUnit test case.
 */
class RendererHeroUnitTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new HeroUnit('herounit');
		$provider[] = array($w, '<div id="herounit" class="hero-unit"></div>');
		
		$w = new HeroUnit('herounit');
		$w->append(new Title('Teste'));
		$provider[] = array($w, '<div id="herounit" class="hero-unit"><h1>Teste</h1></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererHeroUnit();
	}

}
?>