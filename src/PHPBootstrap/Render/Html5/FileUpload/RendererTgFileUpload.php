<?php
namespace PHPBootstrap\Render\Html5\FileUpload;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererToggle;
use PHPBootstrap\Widget\FileUpload\TgFileUpload;

/**
 * Renderiza alternador de upload de arquivos
 */
class RendererTgFileUpload extends RendererToggle {

	/**
	 * Nome do toggle
	 *
	 * @var string
	 */
	const TOGGLENAME = 'fileupload';

	/**
	 *
	 * @see RendererToggle::_render()
	 */
	protected function _render( TgFileUpload $ui, HtmlNode $node ) {
		parent::_render($ui, $node);
		$node->setAttribute('data-identify', $ui->getIdentify());
		$node->setAttribute('data-remote', $ui->getAction()->toURI());
	}

}
?>