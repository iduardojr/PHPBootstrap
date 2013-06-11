<?php
use PHPBootstrap\Widget\Media\Media;
use PHPBootstrap\Widget\Media\MediaList;
use PHPBootstrap\Render\Html5\Media\RendererMediaList;

require_once 'tests\RendererTest.php';

/**
 * RendererMediaList test case.
 */
class RendererMediaListTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new MediaList('teste');
		$provider[] = array($w, '<ul id="teste" class="media-list"></ul>');
		
		$w = new MediaList('teste');
		$w->addMedia(new Media());
		$provider[] = array($w, '<ul id="teste" class="media-list"><li class="media"></li></ul>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererMediaList();
	}

}
?>