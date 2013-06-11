<?php
use PHPBootstrap\Widget\Progress\ProgressBar;
use PHPBootstrap\Widget\Progress\Bar;
use PHPBootstrap\Render\Html5\Progress\RendererProgressBar;

require_once 'tests\RendererTest.php';

/**
 * RendererProgressBar test case.
 */
class RendererProgressBarTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		
		$w = new ProgressBar('bar');
		$provider[] = array($w, '<div id="bar" class="progress"></div>');
		
		$w = new ProgressBar('bar');
		$w->setStyle(ProgressBar::Animated);
		$provider[] = array($w, '<div id="bar" class="progress progress-striped active"></div>');
		
		$w = new ProgressBar('bar', new Bar(10));
		$provider[] = array($w, '<div id="bar" class="progress"><div class="bar" style="width: 10%"></div></div>');
		
		return $provider;
		
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererProgressBar();
	}

}
?>