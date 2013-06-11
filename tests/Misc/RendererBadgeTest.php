<?php
use PHPBootstrap\Widget\Misc\Badge;
use PHPBootstrap\Render\Html5\Misc\RendererBadge;

require_once 'tests\RendererTest.php';

/**
 * RendererBadge test case.
 */
class RendererBadgeTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Badge('17');
		$provider[] = array(clone $w, '<span class="badge">17</span>');
		
		$w = new Badge('17');
		$w->setName('tag');
		$provider[] = array(clone $w, '<span id="tag" class="badge">17</span>');
		
		$w = new Badge('17');
		$w->setStyle(Badge::Important);
		$provider[] = array(clone $w, '<span class="badge badge-important">17</span>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererBadge();
	}

}
?>