<?php
namespace PHPBootstrap\Widget\Misc;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\AbstractWidget;

/**
 * Alerta
 */
class Alert extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.misc.alert';

	// Gravidades
	const Success = 'alert-success';
	const Warning = 'alert-warning';
	const Error = 'alert-error';
	const Danger = 'alert-danger';
	const Info = 'alert-info';

	/**
	 * Mensagem
	 *
	 * @var string|Widget
	 */
	protected $message;

	/**
	 * Gravidade
	 *
	 * @var string
	 */
	protected $severity;

	/**
	 * Fechavel
	 *
	 * @var boolean
	 */
	protected $closable;

	/**
	 * Layout em bloco
	 *
	 * @var boolean
	 */
	protected $block;
	
	/**
	 * Construtor
	 *
	 * @param string|Widget $message
	 * @param string $severity
	 * @param boolean $closable
	 * @param boolean $block
	 * @param boolean $animation
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $message, $severity = null, $closable = true, $block = false, $animation = true ) {
		$this->setMessage($message);
		$this->setSeverity($severity);
		$this->setClosable($closable);
		$this->setBlock($block);
		$this->setAnimation($animation);
	}
	
	/**
	 * Obtem animaчуo
	 *
	 * @return boolean
	 */
	public function getAnimation() {
		return $this->animation;
	}
	
	/**
	 * Atribui animaчуo
	 *
	 * @param boolean $animation
	 */
	public function setAnimation( $animation ) {
		$this->animation = ( bool ) $animation;
	}

	/**
	 * Atribui mensagem
	 *
	 * @param string|Widget $message
	 * @throws \InvalidArgumentException
	 */
	public function setMessage( $message ) {
		if ( ! (is_scalar($message) || $message instanceof Widget) ) {
			throw new \InvalidArgumentException('message not is string or instance of PHPBootstrap/Widget/Widget');
		}
		$this->message = $message;
	}

	/**
	 * Obtem messagem
	 *
	 * @return string|Widget
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * Atribui a gravidade do alerta: 
	 * - Alert.Success
	 * - Alert.Info
	 * - Alert.Error 
	 * - Alert.Danger
	 *
	 * @param string $severity
	 * @throws \UnexpectedValueException
	 */
	public function setSeverity( $severity ) {
		$this->severity = Enum::ensure($severity, $this, null);
	}

	/**
	 * Obtem a gravidade do alerta
	 *
	 * @return string
	 */
	public function getSeverity() {
		return $this->severity;
	}

	/**
	 * Obtem se exibirс botуo fechar
	 *
	 * @return boolean
	 */
	public function getClosable() {
		return $this->closable;
	}

	/**
	 * Atribui o botуo fechar
	 *
	 * @param boolean $closable
	 */
	public function setClosable( $closable ) {
		$this->closable = ( bool ) $closable;
	}

	/**
	 * Obtem layout em bloco
	 *
	 * @return boolean
	 */
	public function getBlock() {
		return $this->block;
	}

	/**
	 * Atribui layout em bloco
	 *
	 * @param boolean $block
	 */
	public function setBlock( $block ) {
		$this->block = ( bool ) $block;
	}

}
?>