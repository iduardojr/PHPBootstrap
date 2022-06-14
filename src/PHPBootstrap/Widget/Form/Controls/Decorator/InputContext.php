<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Validate\Required\Context;
use PHPBootstrap\Widget\Form\Inputable;
use PHPBootstrap\Widget\Form\Controls\FileBox;
use PHPBootstrap\Widget\Form\Controls\XFileBox;

/**
 * Contexto de controle
 */
class InputContext implements Context {
	
	/**
	 * Parametro
	 * 
	 * @var mixed
	 */
	protected $contextParam;
	
	/**
	 * Input 
	 * 
	 * @var Inputable
	 */
	protected $contextInput;
	
	/**
	 * @param Inputable $input
	 * @param mixed $param
	 */
	public function __construct(Inputable $input, $param = null) {
		$this->contextInput = $input;
		$this->contextParam = $param;
	}
	
	/**
	 * Obtem o input do contexto
	 * 
	 * @return Inputable
	 */
	public function getContextInput() {
		return $this->contextInput;
	}
	
	/**
	 * Obtem o parametro do contexto
	 * 
	 * @return mixed
	 */
	public function getContextParam() {
		return $this->contextParam;
	}
	
	/**
	 * 
	 * @see Context::getContextValue()
	 */
	public function getContextValue() {
		return $this->contextInput->getValue();
	}

	/**
	 * @see Context::isDependency()
	 */
	public function isDependency() {
		$values = $this->getContextValue();
		$params = $this->getContextParam();
		if ($this->contextInput instanceof FileBox || $this->contextInput instanceof XFileBox) {
			if ( isset($values['error']) && $values['error'] === UPLOAD_ERR_OK ) {
				return true;
			}
			return false;
		}
		if ( $params !== null ) {
			$params = is_array($params) ? $params : [$params];
			$values = is_array($values) ? $values : [$values];
			foreach ($params as $param) {
				foreach ($values as $value) {
					if ($param == $value) {
						return true;
					}
				}
			}
			return false;
		}
		return ! empty($values);
	}

}
?>