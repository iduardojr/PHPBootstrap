<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\Form\Inputable;
use PHPBootstrap\Widget\AbstractContainer;

/**
 * Grupo de Controles
 */
class ControlGroup extends AbstractContainer {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.group';
	
	// Gravidade
	const Info 	  = 'info';
	const Success = 'success';
	const Warning = 'warning';
	const Error  = 'error';

	/**
	 * Rotulo
	 *
	 * @var Label
	 */
	protected $label;

	/**
	 * Ajuda
	 *
	 * @var Help
	 */
	protected $help;

	/**
	 * Gravidade
	 *
	 * @var string
	 */
	protected $severity;
	
	/**
	 * Construtor 
	 * 
	 * @param Label $label
	 * @param Inputable|array $inputs
	 * @param Help $help
	 */
	public function __construct( Label $label = null, $inputs = null, Help $help = null ) {
		parent::__construct();
		$this->setLabel($label);
		$this->setHelp($help);
		if ( $inputs ) {
			if ( ! is_array($inputs) ) {
				$inputs = array($inputs);
			}
			foreach ( $inputs as $input ) {
				$this->append($input);
			}
		}
	}
	
	/**
	 * Adiciona um input no fim
	 *
	 * @param Inputable $input
	 * @return boolean
	 * @throws \InvalidArgumentException
	 */
	public function append( Inputable $input ) {
		return parent::append($input);
	}
	
	/**
	 * Adiciona um input no inicio
	 *
	 * @param Inputable $input
	 * @return boolean
	 * @throws \InvalidArgumentException
	 */
	public function prepend( Inputable $input ) {
		return parent::prepend($input);
	}
	
	/**
	 * Insere um input apos o outro
	 *
	 * @param Inputable $target
	 * @param Inputable $input
	 * @return boolean
	 * @throws \InvalidArgumentException
	 */
	public function after( Inputable $target, Inputable $input ) {
		return parent::after($target, $input);
	}
	
	/**
	 * Insere um input antes de outro
	 *
	 * @param Inputable $target
	 * @param Inputable $widget
	 * @return boolean
	 * @throws \InvalidArgumentException
	 */
	public function before( Inputable $target, Inputable $input ) {
		return parent::before($target, $input);
	}
	
	/**
	 * Substitui um input por outro
	 *
	 * @param Inputable $target
	 * @param Inputable $input
	 * @throws \InvalidArgumentException
	 */
	public function replace( Inputable $target, Inputable $input ) {
		return parent::replace($target, $input);
	}
	
	/**
	 * Obtem rotulo
	 *
	 * @return Label
	 */
	public function getLabel() {
		return $this->label;
	}

	/**
	 * Atribui rotulo
	 *
	 * @param Label $label
	 */
	public function setLabel( Label $label = null ) {
		if ( $label !== null ) {
			$label->setParent($this);
		}
		$this->label = $label;
	}

	/**
	 * Adiciona ajuda
	 *
	 * @param Help $help
	 */
	public function setHelp( Help $help = null ) {
		if ( $help !== null ) {
			$help->setParent($this);
		}
		$this->help = $help;
	}

	/**
	 * Obtem ajuda
	 *
	 * @return Help
	 */
	public function getHelp() {
		return $this->help;
	}

	/**
	 * Obtem a gravidade da validaчуo
	 *
	 * @return string
	 */
	public function getSeverity() {
		return $this->severity;
	}

	/**
	 * Atribui uma gravidade da validaчуo:
	 * - ControlGroup.Info
	 * - ControlGroup.Success
	 * - ControlGroup.Warning
	 * - ControlGroup.Error
	 *
	 * @param string $severity
	 * @throws \UnexpectedValueException
	 */
	public function setSeverity( $severity ) {
		$this->severity = Enum::ensure($severity, $this, null);
	}

}
?>