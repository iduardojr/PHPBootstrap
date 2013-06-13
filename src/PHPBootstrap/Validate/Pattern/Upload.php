<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Validate\AbstractValidate;
use PHPBootstrap\Validate\Patternable;

/**
 * Upload de Arquivo
 */
class Upload extends AbstractValidate implements Patternable {

	/**
	 * Identificaчуo do validaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'extension';

	/**
	 * Construtor
	 *
	 * @param array $mimetype array('mimetype' => 'extensao')
	 * @param string $message
	 */
	public function __construct( array $mimetypes, $message = null ) {
		$this->context = $mimetypes;
		$this->setMessage($message);
	}

	/**
	 * Obtem uma regex das extensoes
	 * 
	 * @return string
	 */
	public function getContext() {
		return implode('|', array_unique($this->context));
	}

	/**
	 *
	 * @see Validate::valid()
	 */
	public function valid( $value ) {
		if ( ! isset($value['type']) || ! isset($value['name']) ) {
			throw new \InvalidArgumentException('value not is a upload valid');
		}
		return isset($this->context[$value['type']]) && preg_match('/\.(' . $this->getContext() . ')$/', $value['name']) > 0;
	}

	/**
	 * Upload de arquivo de Imagem
	 * 
	 * @return Upload
	 */
	public static function Image() {
		return new Upload(array( 'image/jpeg' => 'jpe?g', 
								 'image/pjpeg' => 'jpe?g', 
								 'image/gif' => 'gif', 
								 'image/png' => 'png' ));
	}
	
	/**
	 * Obtem uma mensagem default
	 *
	 * @return string
	 */
	protected function getDefaultMessage() {
		return 'value "%s" is not file valid';
	}

}
?>