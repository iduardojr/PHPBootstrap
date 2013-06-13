<?php
namespace PHPBootstrap\Validate\Measure\Ruler;

/**
 * Regua de upload
 */
class RulerUpload extends Ruler {
	
	/**
	 * Identificaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'Upload';
	
	/**
	 * Instancia
	 *
	 * @var RulerUpload
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
	 * @return RulerUpload
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
		if ( is_array($value) ) {
			if ( !isset($value['size']) || ! isset($value['error']) || $value['error'] !== UPLOAD_ERR_OK) {
				throw new \InvalidArgumentException('value not is a upload valid');
			}
			return $value['size'];
		}
		return 0;
	}

}
?>