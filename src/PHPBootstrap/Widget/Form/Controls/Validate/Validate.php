<?php
namespace PHPBootstrap\Widget\Form\Controls\Validate;

use PHPBootstrap\Common\ArrayIterator;
use PHPBootstrap\Widget\AbstractRender;

/**
 * Renderizador de um grupo de regras
 */
class Validate extends AbstractRender implements \IteratorAggregate {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.validate';

	/**
	 * Regras
	 *
	 * @var array
	 */
	protected $rules;

	/**
	 * Construtor
	 *
	 * @param array $rules
	 * @throws \InvalidArgumentException
	 */
	public function __construct( array $rules ) {
		foreach ( $rules as $key => $rule ) {
			if ( ! $rule instanceof AbstractRule ) {
				throw new \InvalidArgumentException('rule[' . $key . '] not is instance of PHPBootstrap\Widget\Form\Controls\Validate\AbstractRule');
			}
		}
		$this->rules = $rules;
	}

	/**
	 * 
	 * @see IteratorAggregate::getIterator()
	 */
	public function getIterator() {
		return new ArrayIterator($this->rules);
	}

}
?>