<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Timepicker\TgTimePicker;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Validate\Pattern\Time;
use PHPBootstrap\Validate\Measurable;
use PHPBootstrap\Validate\Measure\Min;
use PHPBootstrap\Validate\Measure\Max;
use PHPBootstrap\Validate\Measure\Range;
use PHPBootstrap\Validate\Measure\Ruler\RulerDate;

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
	public function __construct( $name, Time $pattern ) {
		$this->toggle = new TgTimePicker($pattern->getFormat());
		$this->icon = new Icon('icon-time');
		parent::__construct($name);
		$this->toggle->setTarget($this->input);
		$this->setPattern($pattern);
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
	 * @return Time
	 */
	public function getPattern() {
		return $this->input->getPattern();
	}

	/**
	 * Atribui o padrуo
	 *
	 * @param Time $rule
	 */
	public function setPattern( Time $rule ) {
		$this->input->setPattern($rule);
		$this->toggle->setFormat($rule->getFormat());
		$this->input->setMask(str_replace(array( 'h', 'H', 'm', 's' ), '9', $rule->getFormat()->pattern()));
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
	 * @param Measurable $rule
	 */
	public function setLength( Measurable $rule = null ) {
		if ( $rule !== null ) {
			$rule->setRuler(new RulerDate($this->toggle->getFormat()));
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
		$this->input->setLength($rule);
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