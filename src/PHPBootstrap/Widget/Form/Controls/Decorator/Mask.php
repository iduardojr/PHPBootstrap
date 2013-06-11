<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Widget\AbstractRender;

/**
 * Mascara
 */
class Mask extends AbstractRender implements Maskable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.decorator.mask';

	// Mascaras
	const PhoneBR = '?(99) 9999-9999';
	const ZipCodeBR = '?99.999-999';
	const CNPJ = '?99.999.999/9999-99';
	const CPF = '?999.999.999-99';
	const DateBR = '?99/99/9999';
	const TimeFull = '?99:99:99';
	const TimeShort = '?99:99';

	/**
	 * Padrão
	 * 
	 * @var string
	 */
	protected $pattern;

	/**
	 * Construtor
	 *
	 * @param string $pattern
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $pattern ) {
		$this->setPattern($pattern);
	}

	/**
	 * Obtem o padrão da mascara
	 *
	 * @return string
	 */
	public function getPattern() {
		return $this->pattern;
	}

	/**
	 * Atribui um padrão para a mascara
	 *
	 * @param string $pattern
	 * @throws \InvalidArgumentException
	 */
	public function setPattern( $pattern ) {
		if ( ! is_string($pattern) || empty($pattern) ) {
			throw new \InvalidArgumentException('mask not is string or empty');
		}
		$this->pattern = $pattern;
	}

}
?>