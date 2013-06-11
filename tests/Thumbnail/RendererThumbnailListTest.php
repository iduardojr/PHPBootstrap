<?php
use PHPBootstrap\Widget\Misc\Image;
use PHPBootstrap\Widget\Thumbnail\Thumbnail;
use PHPBootstrap\Widget\Thumbnail\ThumbnailList;
use PHPBootstrap\Render\Html5\Thumbnail\RendererThumbnailList;

require_once 'tests\RendererTest.php';

/**
 * RendererThumbnailList test case.
 */
class RendererThumbnailListTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new ThumbnailList('teste', 3);
		$provider[] = array($w, '<ul id="teste" class="thumbnails"></ul>');
		
		$w = new ThumbnailList('teste', 3);
		$w->addThumbnail(new Thumbnail(new Image('img.jpg')));
		$provider[] = array($w, '<ul id="teste" class="thumbnails"><li class="span3"><a class="thumbnail" href="#"><img src="img.jpg"></a></li></ul>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererThumbnailList();
	}

}
?>