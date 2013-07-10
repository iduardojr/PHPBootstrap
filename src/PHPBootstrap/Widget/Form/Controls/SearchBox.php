<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Modal\Modal;
use PHPBootstrap\Format\Formatter;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Widget\Form\Controls\Decorator\TgSearch;
use PHPBootstrap\Widget\Form\Controls\Decorator\Suggestible;
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Validate\Measurable;
use PHPBootstrap\Validate\Patternable;

/**
 * Caixa de pesquisa
 */
class SearchBox extends AbstractTextBoxComponent {
	
	/**
	 * Construtor
	 * 
	 * 
	 * @param string $name
	 * @param Action $action
	 * @param Modal $output
	 */
	public function __construct( $name, Action $action, Modal $output = null ) {
		$this->toggle = new TgSearch($action, null, $output);
		$this->icon = new Icon('icon-search');
		parent::__construct($name);
		$this->setEnableQuery(true);
	}
	
	/**
	 * Habilita o campo de busca
	 *
	 * @param boolean $enableQuery
	 */
	public function setEnableQuery( $enableQuery ) {
		$this->toggle->setQuery($enableQuery ? $this->input : null);
		if ( !$this->getDisabled() ) {
			$this->input->setDisabled(!$enableQuery);
		}
	}
	
	/**
	 * Obtem a habilitaчуo do campo de busca
	 *
	 * @return boolean
	 */
	public function getEnableQuery() {
		return $this->toggle->getQuery() == $this->input;
	}
	
	/**
	 * Atribui campo desabilitado
	 *
	 * @param boolean $disabled
	 */
	public function setDisabled( $disabled ) {
		$this->input->setDisabled($disabled && $this->getEnableQuery());
		$this->button->setDisabled($disabled);
	}
	
	/**
	 * Obtem aчуo
	 *
	 * @return Action
	 */
	public function getAction() {
		return $this->toggle->getAction();
	}
	
	/**
	 * Atribui aчуo
	 *
	 * @param Action $action
	 */
	public function setAction( Action $action ) {
		$this->toggle->setAction($action);
	}
	
	/**
	 * Atribui a mascara de entrada
	 *
	 * @param string|Maskable $mask
	 * @throws \InvalidArgumentException
	 */
	public function setMask( $mask ) {
		$this->input->setMask($mask);
	}
	
	/**
	 * Obtem a mascara de entrada
	 *
	 * @return Maskable
	 */
	public function getMask() {
		return $this->input->getMask();
	}
	
	/**
	 * Atribui sugestуo
	 *
	 * @param Suggestible $suggestion
	 */
	public function setSuggestion( Suggestible $suggestion = null ) {
		$this->input->setSuggestion($suggestion);
	}
	
	/**
	 * Obtem sugestуo
	 *
	 * @return Suggestible
	 */
	public function getSuggestion() {
		return $this->input->getSuggestion();
	}
	
	/**
	 * Atribui um formatador
	 *
	 * @param Formatter $formatter
	 */
	public function setFormatter( Formatter $formatter = null ) {
		$this->input->setFormatter($formatter);
	}
	
	/**
	 * Obtem o formatador
	 *
	 * @return Formatter
	 */
	public function getFormatter() {
		return $this->input->getFormatter();
	}
	
	/**
	 * Obtem o validador da quantidade
	 *
	 * @return Measurable
	 */
	public function getLength() {
		return $this->input->getLength();
	}
	
	/**
	 * Atribui validador da quantidade
	 *
	 * @param Measurable $rule
	 */
	public function setLength( Measurable $rule = null ) {
		$this->input->setLength($rule);
	}
	
	/**
	 * Obtem o validador de padrуo
	 *
	 * @return Patternable
	 */
	public function getPattern() {
		return $this->input->getPattern();
	}
	
	/**
	 * Atribui validador de padrуo
	 *
	 * @param Patternable $rule
	 */
	public function setPattern( Patternable $rule = null ) {
		$this->input->setPattern($rule);
	}
}
?>