<?php
namespace PHPBootstrap\Widget;

/**
 * Interface Widget
 */
interface Widget extends Containable, Renderable {

	/**
	 * Obtem nome
	 *
	 * @return string
	 */
	public function getName();

	/**
	 * Atribui nome
	 *
	 * @param string $name
	 */
	public function setName( $name );

	/**
	 * Atribui pai
	 *
	 * @param Containable $parent
	 * @throws \RuntimeException
	 */
	public function setParent( Containable $parent = null );

	/**
	 * Obtem pai
	 *
	 * @return Containable
	 */
	public function getParent();

}
?>