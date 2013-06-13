<?php
namespace PHPBootstrap\Validate\Measure\Ruler;

/**
 * Regua de Palavras
 */
class RulerWords extends Ruler {

	/**
	 * Identificaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'Words';
	
	/**
	 * Instancia
	 *
	 * @var RulerWords
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
	 * @return RulerWords
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
		if (! is_string($value)) {
			throw new \InvalidArgumentException('value is not type string');
		}
		$value = trim(ereg_replace('[0-9\.\(\),;:!\?%#$\'\"_+=\/\-]*', '', strip_tags($value)));
		$match = array();
		return preg_match_all('/\w+/', $value, $match);
	}

}
?>