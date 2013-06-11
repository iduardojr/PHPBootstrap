<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Misc\Paragraph;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Misc\Image;
use PHPBootstrap\Widget\Thumbnail\Thumbnail;
use PHPBootstrap\Render\Html5\Thumbnail\RendererThumbnail;

require_once 'tests\RendererTest.php';

/**
 * RendererThumbnail test case.
 */
class RendererThumbnailTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Thumbnail(new Image('img.jpg'));
		$provider[] = array($w, '<a class="thumbnail" href="#"><img src="img.jpg"></a>');

		$w = new Thumbnail(new Image('img.jpg'));
		$w->setName('thumb');
		$provider[] = array($w, '<a id="thumb" class="thumbnail" href="#"><img src="img.jpg"></a>');
		
		$w = new Thumbnail(new Image('img.jpg'));
		$w->setToggle(new TgLink(new Action('Test')));
		$provider[] = array($w, '<a class="thumbnail" href="?class=Test"><img src="img.jpg"></a>');
		
		$w = new Thumbnail(new Image('img.jpg'));
		$w->setTooltip(new Tooltip('Teste'));
		$provider[] = array($w, '<a class="thumbnail" href="#" rel="tooltip" title="Teste"><img src="img.jpg"></a>');
		
		$w = new Thumbnail(new Image('img.jpg'));
		$w->setCaption(new Paragraph('teste'));
		$provider[] = array($w, '<div class="thumbnail"><img src="img.jpg"><div class="caption"><p>teste</p></div></div>');
		
		$w = new Thumbnail(new Image('img.jpg'));
		$w->setToggle(new TgLink(new Action('Test')));
		$w->setCaption(new Paragraph('teste'));
		$provider[] = array($w, '<div class="thumbnail"><a href="?class=Test"><img src="img.jpg"></a><div class="caption"><p>teste</p></div></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererThumbnail();
	}

}
?>