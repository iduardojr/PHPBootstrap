<?php
namespace PHPBootstrap\Validate\Measure\Ruler;

/**
 * Regua de string, array ou \Countable
 */
class RulerLength extends Ruler {

	/**
	 * Identificaчуo
	 * 
	 * @var string
	 */
	const IDENTIFY = 'length';
	
	/**
	 * Instancia
	 *
	 * @var RulerLength
	 */
	protected static $instance;
	
	/**
	 * Construtor
	 */
	private function __construct() {
	
	}
	
	/**
	 * Obtem uma instancia 
	 *
	 * @return RulerLength
	 */
	public static function getInstance() {
		if ( ! isset(static::$instance) ) {
			$class = get_called_class();
			static::$instance = new $class();
		}
		return static::$instance;
	}

	/**
	 * 
	 * @see Ruler::measure()
	 */
	public function measure( $value ) {
		if ( is_string($value) ) {
			return strlen($value);
		}
		if ( is_array($value) || $value instanceof \Countable ) {
			return count($value);
		}
		throw new \InvalidArgumentException('value is not type string, array or instance of \Countable');
	}

}
?>