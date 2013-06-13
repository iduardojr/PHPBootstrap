<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Validate\Pattern\Upload;
use PHPBootstrap\Validate\Measurable;
use PHPBootstrap\Validate\Measure\Ruler\RulerUpload;

/**
 * Campo de upload de arquivo
 */
class FileBox extends AbstractInput {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.filebox';
	
	/**
	 *
	 * @see AbstractInput::prepare()
	 */
	public function prepare( Form $form ) {
		$this->setValue(null);
		$this->setForm($form);
		$form->setMethod(Form::Post);
		$form->setEncoding(Form::MultiPart);
	}

	/**
	 * Obtem validador do padrão
	 *
	 * @return Upload
	 */
	public function getPattern() {
		return $this->validator->getPattern();
	}

	/**
	 * Atribui validador do padrao
	 *
	 * @param Upload $rule
	 */
	public function setPattern( Upload $rule = null ) {
		$this->validator->setPattern($rule);
	}

	/**
	 * Obtem o validador da quantidade
	 *
	 * @return Measurable
	 */
	public function getLength() {
		return $this->validator->getLength();
	}

	/**
	 * Atribui validador da quantidade
	 *
	 * @param Measurable $rule
	 */
	public function setLength( Measurable $rule = null ) {
		if ( $rule !== null ) {
			$rule->setRuler(RulerUpload::getInstance());
		}
		$this->validator->setLength($rule);
	}
	
	/**
	 *
	 * @see AbstractInput::getContextValue()
	 */
	public function getContextValue() {
		if ( isset($this->value['error']) && $this->value['error'] === UPLOAD_ERR_OK ) {
			return $this->value['name'];
		}
		return null;
	}

}
?>