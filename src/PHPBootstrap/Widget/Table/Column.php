<?php
namespace PHPBootstrap\Widget\Table;

use PHPBootstrap\Widget\Form\Togglable;

use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Toggle\Pluggable;

/**
 * Coluna
 */
abstract class Column extends AbstractRender {

	/**
	 * Nome
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Rotulo
	 *
	 * @var string
	 */
	protected $label;

	/**
	 * Tamanho
	 *
	 * @var integer
	 */
	protected $span;

	/**
	 * Alternador
	 *
	 * @var Togglable
	 */
	protected $toggle;

	/**
	 * Tabela
	 *
	 * @var Table
	 */
	protected $table;

	/**
	 * Obtem nome
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Atribui Alternador
	 *
	 * @param Pluggable $toggle
	 */
	public function setToggle( Pluggable $toggle = null ) {
		$this->toggle = $toggle;
	}

	/**
	 * Obtem Alternador
	 *
	 * @return Togglable
	 */
	public function getToggle() {
		return $this->toggle;
	}

	/**
	 * Atribui nome
	 *
	 * @param string $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * Obtem rotulo
	 *
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}

	/**
	 * Atribui rotulo
	 *
	 * @param string $label
	 */
	public function setLabel( $label ) {
		$this->label = $label;
	}

	/**
	 * Obtem tamanho
	 *
	 * @return integer
	 */
	public function getSpan() {
		return $this->span;
	}

	/**
	 * Atribui tamanho
	 *
	 * @param integer $span
	 */
	public function setSpan( $span ) {
		$this->span = ( int ) $span < 0 ? 0 : $span;
	}

	/**
	 * Obtem a tabela
	 * 
	 * @return Table
	 */
	public function getTable() {
		return $this->table;
	}

	/**
	 * Atribui a tabela
	 * 
	 * @param Table $table
	 */
	public function setTable( Table $table = null ) {
		$this->table = $table;
	}

}
?>