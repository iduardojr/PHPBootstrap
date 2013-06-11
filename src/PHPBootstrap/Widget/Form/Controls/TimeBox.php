<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Format\TimeFormat;
use PHPBootstrap\Validate\Length\Length;
use PHPBootstrap\Validate\Length\Range;
use PHPBootstrap\Validate\Length\Max;
use PHPBootstrap\Validate\Length\Min;
use PHPBootstrap\Validate\Length\Counter\DateLen;
use PHPBootstrap\Validate\Pattern\Regex;
use PHPBootstrap\Widget\Timepicker\TgTimePicker;
use PHPBootstrap\Widget\Misc\Icon;

/**
 * Campo de hora
 */
class TimeBox extends AbstractTextBoxComponent {

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param Time $pattern
	 * @param string $message
	 */
	public function __construct( $name, TimeFormat $pattern, $message ) {
		$this->toggle = new TgTimePicker($pattern);
		$this->icon = new Icon('icon-time');
		parent::__construct($name);
		$this->toggle->setTarget($this->input);
		$this->setPattern($pattern, $message);
	}

	/**
	 * Obtem o formato
	 *
	 * @return TimeFormat
	 */
	public function getFormat() {
		return $this->toggle->getFormat();
	}

	/**
	 * Obtem o padrуo
	 *
	 * @return Pattern
	 */
	public function getPattern() {
		return $this->input->getPattern();
	}

	/**
	 * Atribui o padrуo
	 *
	 * @param TimeFormat $format
	 * @param string $message
	 */
	public function setPattern( TimeFormat $format, $message ) {
		$this->toggle->setFormat($format);
		$this->input->setPattern(new Regex($format->regex()), $message);
		$this->input->setMask(str_replace(array( 'h', 'H', 'm', 's' ), '9', $format->pattern()));
	}

	/**
	 * Obtem o validador da quantidade
	 *
	 * @return Length
	 */
	public function getLength() {
		return $this->input->getLength();
	}

	/**
	 * Atribui validador da quantidade
	 *
	 * @param Length $rule
	 * @param string $message
	 */
	public function setLength( Length $rule = null, $message = null ) {
		if ( $rule !== null ) {
			$rule->setCounter(new DateLen($this->toggle->getFormat()));
			$value = $rule->getValue();
			if ( $rule instanceof Min ) {
				$this->toggle->setStartTime($value);
			} elseif ($rule instanceof Max ) {
				$this->toggle->setEndTime($value);
			} elseif ($rule instanceof Range ) {
				$this->toggle->setBetweenTime($value[0], $value[1]);
			}
		} else {
			$this->toggle->setBetweenTime(null, null);
		}
		$this->input->setLength($rule, $message);
	}

	/**
	 * Atribui o passo entre minutos
	 *
	 * @param integer $minuteStep
	 */
	public function setMinuteStep( $minuteStep ) {
		$this->toggle->setMinuteStep($minuteStep);
	}

	/**
	 * Obtem o passo entre minutos
	 *
	 * @return integer
	 */
	public function getMinuteStep() {
		return $this->toggle->getMinuteStep();
	}

	/**
	 * Atribui o passo entre segundos
	 *
	 * @param integer $secondStep
	 */
	public function setSecondStep( $secondStep ) {
		$this->toggle->setSecondStep($secondStep);
	}

	/**
	 * Obtem o passo entre segundos
	 * 
	 * @return integer
	 */
	public function getSecondStep() {
		return $this->toggle->getSecondStep();
	}

	/**
	 * Atribui os passos entre minutos e segundos
	 *
	 * @param integer $minuteStep
	 * @param integer $secondStep
	 */
	public function setStep( $minuteStep, $secondStep ) {
		$this->toggle->setStep($minuteStep, $secondStep);
	}

	/**
	 * Atribui a exibiчуo de cambos de entrada
	 *
	 * @param boolean $showInputs
	 */
	public function setShowInputs( $showInputs ) {
		$this->toggle->setShowInputs($showInputs);
	}

}
?>