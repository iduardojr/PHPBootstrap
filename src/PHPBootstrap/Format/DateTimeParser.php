<?php
namespace PHPBootstrap\Format;

/**
 * Conversor para DateTime
 */
class DateTimeParser implements DateParser {
	
	/**
	 * Instancia
	 *
	 * @var DateTimeParser
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
	 * @return DateTimeParser
	 */
	public static function getInstance() {
		if ( ! isset(static::$instance) ) {
			$class = get_called_class();
			static::$instance = new $class();
		}
		return static::$instance;
	}

	/**
	 * Converte para DateTime a partir da representaчуo em string
	 *
	 * @param string $value
	 * @return \DateTime
	 * @throws \InvalidArgumentException
	 */
	public function parse( $value ) {
		return new \DateTime($value);
	}

}
?>