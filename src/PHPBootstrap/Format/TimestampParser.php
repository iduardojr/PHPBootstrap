<?php
namespace PHPBootstrap\Format;

/**
 * Conversor para Timestamp
 */
class TimestampParser implements DateParser {
	
	/**
	 * Instancia
	 *
	 * @var TimestampParser
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
	 * @return TimestampParser
	 */
	public static function getInstance() {
		if ( ! isset(static::$instance) ) {
			$class = get_called_class();
			static::$instance = new $class();
		}
		return static::$instance;
	}

	/**
	 * Converte para timestamp a partir da representaчуo em string
	 *
	 * @param string $value
	 * @return integer
	 * @throws \InvalidArgumentException
	 */
	public function parse( $value ) {
		return strtotime($value);
	}

}
?>