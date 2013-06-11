<?php
namespace PHPBootstrap\Validate\Pattern;

/**
 * Upload de Arquivo
 */
class Upload extends Pattern {

	/**
	 * Identificaчуo do validaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'extension';

	/**
	 * Mime-type
	 *
	 * @var array
	 */
	protected $mimeType;

	/**
	 * Construtor
	 *
	 * @param array $mimetype array('mimetype' => 'extensao')
	 */
	public function __construct( array $mimetypes ) {
		$this->mimeType = $mimetypes;
	}

	/**
	 * 
	 * @see Pattern::getPattern()
	 */
	public function getPattern() {
		return implode('|', array_unique($this->mimeType));
	}

	/**
	 *
	 * @see Validate::valid()
	 */
	public function valid( $value ) {
		if ( ! isset($value['type']) || ! isset($value['name']) || ! isset($value['error']) || $value['error'] !== UPLOAD_ERR_OK ) {
			throw new \InvalidArgumentException('value not is a upload valid');
		}
		return isset($this->mimeType[$value['type']]) && preg_match('/\.(' . $this->getPattern() . ')$/', $value['name']) > 0;
	}

	/**
	 * Upload de arquivo de Imagem
	 * 
	 * @return Upload
	 */
	public static function image() {
		return new Upload(array( 'image/jpeg' => 'jpe?g', 
								 'image/pjpeg' => 'jpe?g', 
								 'image/gif' => 'gif', 
								 'image/png' => 'png' ));
	}

}
?>