<?php
namespace PHPBootstrap\Widget\Accordion;

use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Collapse\Collapsible;
use PHPBootstrap\Widget\Toggle\Pluggable;

/**
 * Item do Acordion
 */
class AccordionItem extends AbstractWidget implements Collapsible {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.accordion.item';

	/**
	 * Gera identificaчуo unica
	 *
	 * @var integer
	 */
	protected static $guid = 1;

	/**
	 * Identificaчуo da instancia
	 *
	 * @var integer
	 */
	protected $identity;

	/**
	 * Titulo
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * Alternador
	 *
	 * @var ToggleDeep
	 */
	protected $toggle;

	/**
	 * Corpo
	 *
	 * @var Widget
	 */
	protected $body;

	/**
	 * Aberto
	 *
	 * @var boolean
	 */
	protected $open = false;

	/**
	 * Construtor
	 *
	 * @param string $title
	 * @param Widget $body
	 */
	public function __construct( $title, Widget $body = null ) {
		$this->identity = self::$guid++;
		$this->setTitle($title);
		$this->setBody($body);
	}

	/**
	 *
	 * @see Collapse::getIdentify()
	 */
	public function getIdentify() {
		return 'collapse-' . str_repeat('0', 3 - strlen($this->identity)) . $this->identity;
	}

	/**
	 * Obtem alternador
	 *
	 * @return Pluggable
	 */
	public function getToggle() {
		return $this->toggle;
	}

	/**
	 * Atribui alternador
	 *
	 * @param Pluggable $toggle
	 */
	public function setToggle( Pluggable $toggle = null ) {
		$this->toggle = $toggle;
	}

	/**
	 * Obtem titulo
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Atribui titulo
	 *
	 * @param string $title
	 */
	public function setTitle( $title ) {
		$this->title = $title;
	}

	/**
	 * Obtem aberto
	 *
	 * @return boolean
	 */
	public function getOpen() {
		return $this->open;
	}

	/**
	 * Atribui Aberto
	 *
	 * @param boolean $open
	 */
	public function setOpen( $open ) {
		$this->open = ( bool ) $open;
	}

	/**
	 * Obtem o corpo
	 *
	 * @return Widget
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 * Atribui o corpo
	 *
	 * @param Widget $body
	 */
	public function setBody( Widget $body = null ) {
		if ( $body !== null ) {
			$body->setParent($this);
		}
		$this->body = $body;
	}

}
?>