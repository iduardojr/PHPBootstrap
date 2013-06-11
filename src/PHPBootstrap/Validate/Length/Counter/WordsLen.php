<?php
namespace PHPBootstrap\Validate\Length\Counter;

/**
 * Calcula a quantidade de Palavras
 */
class WordsLen extends Counter {

	/**
	 * Identificaчуo do contador
	 *
	 * @var string
	 */
	const IDENTIFY = 'Words';
	
	/**
	 * Instancia
	 *
	 * @var WordsLen
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
	 * @return WordsLen
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
		if (! is_string($value)) {
			throw new \InvalidArgumentException('value is not type string');
		}
		$value = trim(ereg_replace('[0-9\.\(\),;:!\?%#$\'\"_+=\/\-]*', '', strip_tags($value)));
		$match = array();
		return preg_match_all('/\w+/', $value, $match);
	}

}
?>