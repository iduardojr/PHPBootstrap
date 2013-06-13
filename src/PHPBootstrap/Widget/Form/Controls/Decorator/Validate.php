<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Common\ArrayIterator;
use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Validate\Validate as Rule;
use PHPBootstrap\Validate\Requirable;

/**
 * Renderizador de um grupo de regras
 */
class Validate extends AbstractRender implements \IteratorAggregate {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.decorator.validate';

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
			if ( ! $rule instanceof Rule ) {
				throw new \InvalidArgumentException('rule[' . $key . '] not is instance of PHPBootstrap\Validate\Validate');
			}
			if ( $rule instanceof Requirable ) {
				$context = $rule->getContext();
				if ( isset($context) && ! $context instanceof InputContext ) {
					throw new \InvalidArgumentException('context in rule not is instance of PHPBootstrap\Widget\Form\Controls\Decorator\InputContext');
				}
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