<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Datepicker\TgDatePicker;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Validate\Measurable;
use PHPBootstrap\Validate\Measure\Ruler\RulerDate;
use PHPBootstrap\Validate\Measure\Min;
use PHPBootstrap\Validate\Measure\Max;
use PHPBootstrap\Validate\Measure\Range;
use PHPBootstrap\Validate\Pattern\Date;

/**
 * Campo de entrada de data
 */
class DateBox extends AbstractTextBoxComponent {
	
	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param Date $pattern
	 * @param string $message
	 */
	public function __construct( $name, Date $pattern ) {
		$this->toggle = new TgDatePicker($pattern->getFormat());
		$this->icon = new Icon('icon-calendar');
		parent::__construct($name);
		$this->toggle->setTarget($this->input);
		$this->setPattern($pattern);
	}
	
	/**
	 * Obtem o formato
	 *
	 * @return DateFormat
	 */
	public function getFormat() {
		return $this->toggle->getFormat();
	}
	
	/**
	 * Obtem o padrão
	 *
	 * @return Date
	 */
	public function getPattern() {
		return $this->input->getPattern();
	}
	
	/**
	 * Atribui o padrão
	 *
	 * @param Date $rule
	 * @param string $message
	 */
	public function setPattern( Date $rule ) {
		$this->input->setPattern($rule);
		$this->toggle->setFormat($rule->getFormat());
		$this->input->setFormatter($rule->getFormat());
		$this->input->setMask(str_replace(array( 'd', 'm', 'y' ), '9', $rule->getFormat()->pattern()));
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
	 */
	public function setLength( Measurable $rule = null ) {
		if ( $rule !== null ) {
			$rule->setRuler(new RulerDate($this->toggle->getFormat()));
			$value = $rule->getValue();
			if ( $rule instanceof Min ) {
				$this->toggle->setStartDate($value);
			} elseif ($rule instanceof Max ) {
				$this->toggle->setEndDate($value);
			} elseif ($rule instanceof Range ) {
				$this->toggle->setBetweenDate($value[0], $value[1]);
			}
		} else {
			$this->toggle->setBetweenDate(null, null);
		}
		$this->validator->setLength($rule);
	}

	/**
	 * Atribui o primeiro dia da semana
	 *
	 * @param integer $weekStart
	 */
	public function setWeekStart( $weekStart ) {
		$this->toggle->setWeekStart($weekStart);
	}

	/**
	 * Obtem o primeiro dia da semana
	 *
	 * @return integer
	 */
	public function getWeekStart() {
		return $this->toggle->getWeekStart();
	}

	/**
	 * Atribui exibir o numero da semana
	 *
	 * @param boolean $calendarWeeks
	 */
	public function setCalendarWeeks( $calendarWeeks ) {
		$this->toggle->setCalendarWeeks($calendarWeeks);
	}

	/**
	 * Obtem exibir o numero da semana
	 *
	 * @return boolean
	 */
	public function getCalendarWeeks() {
		return $this->toggle->getCalendarWeeks();
	}

	/**
	 * Atribui hoje destacado
	 *
	 * @param boolean $todayHighlight
	 */
	public function setTodayHighlight( $todayHighlight ) {
		$this->toggle->setTodayHighlight($todayHighlight);
	}

	/**
	 * Obtem hoje destacado
	 *
	 * @return boolean
	 */
	public function getTodayHighlight() {
		return $this->toggle->getTodayHighlight();
	}

	/**
	 * Atribui exibir botão hoje
	 *
	 * @param boolean $todayButton
	 */
	public function setTodayButton( $todayButton ) {
		$this->toggle->setTodayButton($todayButton);
	}

	/**
	 * Obtem exibir botão hoje
	 * 
	 * @return boolean
	 */
	public function getTodayButton() {
		return $this->toggle->getTodayButton();
	}

	/**
	 * Atribui fechamento automatico
	 *
	 * @param boolean $autoclose
	 */
	public function setAutoclose( $autoclose ) {
		$this->toggle->setAutoclose($autoclose);
	}

	/**
	 * Obtem fechamento automatico
	 * 
	 * @return boolean
	 */
	public function getAutoclose() {
		return $this->toggle->getAutoclose();
	}

}
?>