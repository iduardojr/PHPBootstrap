<?php
namespace PHPBootstrap\Validate\Length\Counter;

/**
 * Calcula o tamanho do upload
 */
class UploadLen extends Counter {
	
	/**
	 * Identificaчуo do contador
	 *
	 * @var string
	 */
	const IDENTIFY = 'Upload';
	
	/**
	 * Instancia
	 *
	 * @var UploadLen
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
	 * @return UploadLen
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
		if ( !isset($value['size']) || ! isset($value['error']) || $value['error'] !== UPLOAD_ERR_OK) {
			throw new \InvalidArgumentException('value not is a upload valid');
		}
		return $value['size'];
	}

}
?>