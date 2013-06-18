<?php
namespace PHPBootstrap\Widget\Pagination;

use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Pagination\Scrolling\Scrollable;

/**
 * Paginador Abstrato
 */
abstract class AbstractPagination extends AbstractWidget implements Pageable {

	/**
	 * Paginador
	 * 
	 * @var Paginator
	 */
	protected $paginator;
	
	/**
	 * Alternador
	 *
	 * @var TgLink
	 */
	protected $toggle;
	
	/**
	 * Rolagem
	 *
	 * @var Scrollable
	 */
	protected $scroll;

	/**
	 * Rotulos
	 *
	 * @var array
	 */
	protected $label = array();

	/**
	 * Construtor
	 *
	 * @param TgLink $toggle
	 * @param Paginator $paginator
	 * @param Scrollable $scroll
	 */
	public function __construct( TgLink $toggle, Paginator $paginator, Scrollable $scroll = null ) {
		$this->setToggle($toggle);
		$this->setPaginator($paginator);
		$this->setScroll($scroll);
		$this->setLabel(null, null, null, null);
	}

	/**
	 * Obtem o paginador
	 * 
	 * @return Paginator
	 */
	public function getPaginator() {
		return $this->paginator;
	}

	/**
	 * Atribui o paginador
	 * 
	 * @param Paginator $paginator
	 */
	public function setPaginator( Paginator $paginator ) {
		$this->paginator = $paginator;
	}
	
	/**
	 * Obtem rolagem
	 *
	 * @return Scrollable
	 */
	public function getScroll() {
		return $this->scroll;
	}
	
	/**
	 * Atribui rolagem
	 *
	 * @param Scrollable $scroll
	 */
	public function setScroll( Scrollable $scroll = null ) {
		$this->scroll = $scroll;
	}

	/**
	 * Atribui alternador
	 *
	 * @param TgLink $toggle
	 */
	public function setToggle( TgLink $toggle ) {
		$this->toggle = $toggle;
	}

	/**
	 * Obtem alternador
	 *
	 * @return TgLink
	 */
	public function getToggle() {
		return $this->toggle;
	}

	/**
	 * Obtem rotulo da primeira pagina
	 *
	 * @return string
	 */
	public function getLabelFirst() {
		return $this->label['first'];
	}

	/**
	 * Atribui rotulo da primeira pagina
	 *
	 * @param string $label
	 */
	public function setLabelFirst( $label ) {
		$this->label['first'] = $label;
	}

	/**
	 * Obtem rotulo da pagina anterior
	 *
	 * @return string
	 */
	public function getLabelPrev() {
		return $this->label['prev'];
	}

	/**
	 * Atribui rotulo pagina anterior
	 *
	 * @param string $label
	 */
	public function setLabelPrev( $label ) {
		$this->label['prev'] = $label;
	}

	/**
	 * Obtem rotulo da pagina posterior
	 *
	 * @return string
	 */
	public function getLabelNext() {
		return $this->label['next'];
	}

	/**
	 * Atribui rotulo da pagina posterior
	 *
	 * @param string $label
	 */
	public function setLabelNext( $label ) {
		$this->label['next'] = $label;
	}

	/**
	 * Obtem rotulo da ultima pagina
	 *
	 * @return string
	 */
	public function getLabelLast() {
		return $this->label['last'];
	}

	/**
	 * Atribui rotulo da pagina posterior
	 *
	 * @param string $label
	 */
	public function setLabelLast( $label ) {
		$this->label['last'] = $label;
	}

	/**
	 * Atribui os rotulos
	 * 
	 * @param string $first
	 * @param string $prev
	 * @param string $next
	 * @param string $last
	 */
	public function setLabel( $first, $prev, $next, $last ) {
		$this->setLabelFirst($first);
		$this->setLabelPrev($prev);
		$this->setLabelNext($next);
		$this->setLabelLast($last);
	}
	
}
?>