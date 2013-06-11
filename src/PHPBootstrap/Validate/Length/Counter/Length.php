<?php
namespace PHPBootstrap\Validate\Length\Counter;

/**
 * Calcula o tamanho de uma string, array ou \Countable
 */
class Length extends Counter {

	/**
	 * Identificaчуo do contador
	 * 
	 * @var string
	 */
	const IDENTIFY = 'length';
	
	/**
	 * Instancia
	 *
	 * @var Length
	 */
	protected static $instance;
	
	/**
	 * Construtor
	 */
	private function __construct() {
	
	}
	
	/**
	 * Obtem uma instancia do contador
	 *
	 * @return Length
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
	 * @see Counter::count()
	 */
	public function count( $value ) {
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