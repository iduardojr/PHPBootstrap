<?php
namespace PHPBootstrap\Widget\Misc;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\AbstractContainer;
use PHPBootstrap\Widget\Widget;

/**
 * Envelope
 */
class Well extends AbstractContainer {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.misc.well';
	
	// Tamanho
	const Large = 'well-large';
	const Small = 'well-small';

	/**
	 * Tamanho
	 *
	 * @var string
	 */
	protected $size;

	/**
	 * Construtor
	 * 
	 * @param string $name
	 * @param Widget $content
	 * @param ...
	 */
	public function __construct( $name, Widget $content = null ) {
		parent::__construct();
		$this->setName($name);
		$contents = func_get_args();
		array_shift($contents);
		foreach ( $contents as $content ) {
			$this->append($content);
		}
		
	}

	/**
	 * Atribui tamanho:
	 * - Well.Large
	 * - Well.Small
	 *
	 * @param string $size
	 */
	public function setSize( $size ) {
		$this->size = Enum::ensure($size, $this, null);
	}

	/**
	 * Obtem tamanho
	 *
	 * @return string
	 */
	public function getSize() {
		return $this->size;
	}

}
?>