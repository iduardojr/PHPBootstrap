<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\FileUpload\TgFileUpload;
use PHPBootstrap\Render\Html5\FileUpload\RendererTgFileUpload;

require_once 'tests\RendererTest.php';

/**
 * RendererTgFileUpload test case.
 */
class RendererTgFileUploadTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('file upload');
		
		$w = new TgFileUpload(new Action('Test'), 'upload');
		$provider[] = array($w, '<a href="#" data-toggle="fileupload" data-identify="upload" data-remote="?class=Test">file upload</a>', new Context(clone $node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgFileUpload();
	}

}
?>