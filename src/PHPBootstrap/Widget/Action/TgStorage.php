<?php
namespace PHPBootstrap\Widget\Action;

use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Toggle\Parameterizable;

/**
 * Alternador de armazenamento
 */
class TgStorage extends AbstractRender implements Pluggable, Parameterizable {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.action.storage';
	
	/**
	 * Dados
	 * 
	 * @var array
	 */
	protected $data;
	
	/**
	 * Construtor
	 *
	 * @param array $data
	 */
	public function __construct( array $data ) {
		$this->data = $data;
	}
	
	/**
	 * Atribui os dados
	 * 
	 * @param array $data
	 */
	public function setData( array $data ) {
		$this->data = $data;
	}
	
	/**
	 * Obtem os dados
	 * 
	 * @return array
	 */
	public function getData() {
		return $this->data;
	}
	
	/**
	 * @see Parameterizable::setParameter()
	 */
	public function setParameter( $name, $value ) {
		$this->data[$name] = $value;
	}
	
}
?>