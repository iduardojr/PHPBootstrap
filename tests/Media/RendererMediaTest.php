<?php
use PHPBootstrap\Widget\Action\Action;

use PHPBootstrap\Widget\Action\TgLink;

use PHPBootstrap\Widget\Misc\Paragraph;

use PHPBootstrap\Widget\Misc\Title;
use PHPBootstrap\Widget\Misc\Image;
use PHPBootstrap\Widget\Media\Media;
use PHPBootstrap\Render\Html5\Media\RendererMedia;

require_once 'tests\RendererTest.php';

/**
 * RendererMedia test case.
 */
class RendererMediaTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Media();
		$provider[] = array($w, '<div class="media"></div>');
		
		$w = new Media();
		$w->setName('media');
		$provider[] = array($w, '<div id="media" class="media"></div>');
		
		$w = new Media();
		$w->setImage(new Image('images/img1.jpg'));
		$provider[] = array($w, '<div class="media"><img src="images/img1.jpg" class="media-object pull-left"></div>');
		
		$w = new Media();
		$w->setImage(new Image('images/img1.jpg'));
		$w->setAlign(Media::Right);
		$provider[] = array($w, '<div class="media"><img src="images/img1.jpg" class="media-object pull-right"></div>');
		
		$w = new Media();
		$w->setImage(new Image('images/img1.jpg'));
		$w->setToggle(new TgLink(new Action('Test')));
		$provider[] = array($w, '<div class="media"><a href="?class=Test"><img src="images/img1.jpg" class="media-object pull-left"></a></div>');
		
		$w = new Media();
		$w->setTitle(new Title('Media'));
		$provider[] = array($w, '<div class="media"><div class="media-body"><h1 class="media-heading">Media</h1></div></div>');
		
		$w = new Media();
		$w->setBody(new Paragraph('Teste'));
		$provider[] = array($w, '<div class="media"><div class="media-body"><p>Teste</p></div></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererMedia();
	}

}
?>