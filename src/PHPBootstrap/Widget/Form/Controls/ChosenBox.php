<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Validate\Measurable;
use PHPBootstrap\Validate\Measure\Ruler\RulerLength;
use PHPBootstrap\Validate\Measure\Max;
use PHPBootstrap\Validate\Measure\Range;

/**
 * Chosen
 */
class ChosenBox extends ComboBox {
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.chosenbox';

	/**
	 * Texto reservado
	 *
	 * @var string
	 */
	protected $placeholder;

	/**
	 * Multiplas op��es
	 * 
	 * @var boolean
	 */
	protected $multiple;

	/**
	 * Exibir selecionados
	 * 
	 * @var boolean
	 */
	protected $displaySelected;

	/**
	 * Texto n�o encontrado
	 * 
	 * @var string
	 */
	protected $textNoResult;

	/**
	 * Exibir pesquisa a partir de n opcoes
	 * 
	 * @var integer
	 */
	protected $displaySearchThreshold;
	
	/**
	 * Desabilita a pesquisa 
	 * 
	 * @var boolean
	 */
	protected $disabledSearch;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param boolean $multiple
	 */
	public function __construct( $name, $multiple = false ) {
		parent::__construct($name);
		$this->setMultiple($multiple);
		$this->setDisplaySelected(false);
	}

	/**
	 * Atribui multiplos
	 *
	 * @param boolean $multiple
	 */
	public function setMultiple( $multiple ) {
		$this->multiple = ( bool ) $multiple;
	}

	/**
	 * Obtem se � multiplos ou n�o
	 *
	 * @return boolean
	 */
	public function getMultiple() {
		return $this->multiple;
	}

	/**
	 * Obtem texto reservado
	 *
	 * @return string
	 */
	public function getPlaceholder() {
		return $this->placeholder;
	}

	/**
	 * Atribui texto reservado
	 *
	 * @param string $placeholder
	 */
	public function setPlaceholder( $placeholder ) {
		$this->placeholder = $placeholder;
	}

	/**
	 * Exibir selecionados
	 * 
	 * @return boolean
	 */
	public function getDisplaySelected() {
		return $this->displaySelected;
	}

	/**
	 * Atribuir exibir selecionados
	 * 
	 * @param boolean $displaySelected
	 */
	public function setDisplaySelected( $displaySelected ) {
		$this->displaySelected = ( bool ) $displaySelected;
	}
	
	/**
	 * Atribuir exibição da pesquisa 
	 * 
	 * @param boolean $disabledSearch
	 */
	public function setDisabledSearch($disabledSearch) {
	    $this->disabledSearch = $disabledSearch;
	}

	/**
	 * Obtem texto para quando nao houver resultados
	 * 
	 * @return string
	 */
	public function getTextNoResult() {
		return $this->textNoResult;
	}

	/**
	 * Atribui texto para quando nao houver resultados
	 * 
	 * @param string $textNoResult
	 */
	public function setTextNoResult( $textNoResult ) {
		$this->textNoResult = $textNoResult;
	}

	/**
	 * Exibir busca para uma quantidade de op��es
	 * 
	 * @return integer
	 */
	public function getDisplaySearchThreshold() {
		return $this->displaySearchThreshold;
	}

	/**
	 * Atribui exibir busca para uma quantidade de op��es
	 * 
	 * @param integer $displaySearchThreshold
	 */
	public function setDisplaySearchThreshold( $displaySearchThreshold ) {
		$this->displaySearchThreshold = ( int ) $displaySearchThreshold;
	}
	
	/**
	 * Obtem a quantidade maxima de op��es selecionadas
	 *
	 * @return integer
	 */
	public function getMaxSelectedOptions() {
		$length = $this->getLength();
		if ( $length instanceof Max ) {
			return $length->getContext();
		} 
		if ( $length instanceof Range ) {
			$max = $length->getContext();
			return $max[1];
		}
		return null;
	}
	
	/**
	 * Obtem se a pesquisa será exibida
	 * 
	 * @return boolean
	 */
	public function getDisabledSearch() {
	    return $this->disabledSearch;
	}

	/**
	 * Obtem o validador da quantidade
	 *
	 * @return Measurable
	 */
	public function getLength() {
		return $this->getMultiple() ? $this->validator->getLength() : null;
	}

	/**
	 * Atribui validador da quantidade
	 *
	 * @param Measurable $rule
	 */
	public function setLength( Measurable $rule = null ) {
		if ( $rule !== null ) {
			$this->setMultiple(true);
			$rule->setRuler(RulerLength::getInstance());
		}
		$this->validator->setLength($rule);
	}

	/**
	 *
	 * @see AbstractInput::setValue()
	 */
	public function setValue( $value ) {
		if ( $value === null || $value == '' ) {
			$value = array();
		} elseif ( !is_array($value) ) {
			$value = array($value );
		}
		$value = array_values($value);
		foreach ( $value as $k => $v ) {
			if ( !is_scalar($v) ) {
				throw new \InvalidArgumentException('value[' . $k . '] is not scalar');
			}
		}
		if ( $this->value !== $value ) {
			$this->valid = null;
			$this->value = $value;
		}
	}

	/**
	 *
	 * @see AbstractInputList::getValue()
	 */
	public function getValue() {
		$values = array();
		foreach ( $this->value as $value ) {
			if ( $this->options->containsKey($value) ) {
				$values[] = $value;
			}
		}
		return $this->getMultiple() ? $values : array_shift($values);
	}
}
?>