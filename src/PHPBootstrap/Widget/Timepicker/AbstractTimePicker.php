<?php
namespace PHPBootstrap\Widget\Timepicker;

use PHPBootstrap\Format\TimeFormat;
use PHPBootstrap\Widget\AbstractRender;

/**
 * Seletor de hora abstrato
 */
abstract class AbstractTimePicker extends AbstractRender {

	/**
	 * Formato
	 *
	 * @var TimeFormat
	 */
	protected $format;

	/**
	 * Diferença entre minutos
	 *
	 * @var integer
	 */
	protected $minuteStep;

	/**
	 * Diferença entre segundos
	 *
	 * @var integer
	 */
	protected $secondStep;

	/**
	 * Exibir campos de entrada
	 *
	 * @var boolean
	 */
	protected $showInputs;

	/**
	 * Hora inicial
	 *
	 * @var string
	 */
	protected $startTime;

	/**
	 * Hora final
	 *
	 * @var string
	 */
	protected $endTime;

	/**
	 * Construtor
	 *
	 * @param TimeFormat $format
	 */
	public function __construct( TimeFormat $format ) {
		$this->setFormat($format);
		$this->setStep(15, 15);
		$this->setShowInputs(false);
		$this->setBetweenTime(null, null);
	}

	/**
	 * Atribui formato
	 *
	 * @param TimeFormat $format
	 */
	public function setFormat( TimeFormat $format ) {
		$this->format = $format;
	}

	/**
	 * Obtem formato
	 *
	 * @return TimeFormat
	 */
	public function getFormat() {
		return $this->format;
	}

	/**
	 * Obtem a diferença entre minutos
	 *
	 * @return integer
	 */
	public function getMinuteStep() {
		return $this->minuteStep;
	}

	/**
	 * Atribui o passo entre minutos
	 *
	 * @param integer $minuteStep
	 */
	public function setMinuteStep( $minuteStep ) {
		$this->minuteStep = ( int ) $minuteStep > 0 ? $minuteStep : 1;
	}

	/**
	 * Obtem o passo entre segundos
	 *
	 * @return integer
	 */
	public function getSecondStep() {
		return $this->secondStep;
	}

	/**
	 * Atribui o passo entre segundo
	 *
	 * @param integer $secondStep
	 */
	public function setSecondStep( $secondStep ) {
		$this->secondStep = ( int ) $secondStep > 0 ? $secondStep : 1;
	}

	/**
	 * Atribui os passos entre minutos e segundos
	 *
	 * @param integer $minute
	 * @param integer $second
	 */
	public function setStep( $minute, $second ) {
		$this->setMinuteStep($minute);
		$this->setSecondStep($second);
	}

	/**
	 * Obtem exibir segundos
	 *
	 * @return boolean
	 */
	public function getShowSeconds() {
		return preg_match('/:ss$/', $this->format->pattern()) > 0;
	}

	/**
	 * Obtem exibição de 12 ou 24 horas
	 *
	 * @return boolean
	 */
	public function getShowMeridian() {
		return preg_match('/^hh:/', $this->format->pattern()) > 0;
	}

	/**
	 * Obtem exibição de campos de entrada
	 *
	 * @return boolean
	 */
	public function getShowInputs() {
		return $this->showInputs;
	}

	/**
	 * Atribui exibir campos de entrada
	 *
	 * @param boolean $showInputs
	 */
	public function setShowInputs( $showInputs ) {
		$this->showInputs = ( bool ) $showInputs;
	}

	/**
	 * Atribui um intervalo limite de horas
	 * 
	 * @param mixed $startTime
	 * @param mixed $endTime
	 * @throws \InvalidArgumentException
	 */
	public function setBetweenTime( $startTime, $endTime ) {
		$this->setStartTime($startTime);
		$this->setEndTime($endTime);
	}

	/**
	 * Atribui a hora limite inicial
	 *
	 * @param mixed $startTime
	 * @throws \InvalidArgumentException
	 */
	public function setStartTime( $startTime ) {
		if ( preg_match($this->format->regex(), $startTime) <= 0 ) {
			$startTime = $this->format->format($startTime);
		}
		$this->startTime = $startTime;
	}

	/**
	 * Obtem a hora limite inicial
	 *
	 * @return string
	 */
	public function getStartTime() {
		return $this->startTime;
	}

	/**
	 * Atribui a hora limite final
	 *
	 * @param mixed $endTime
	 * @throws \InvalidArgumentException
	 */
	public function setEndTime( $endTime ) {
		if ( preg_match($this->format->regex(), $endTime) <= 0 ) {
			$endTime = $this->format->format($endTime);
		}
		$this->endTime = $endTime;
	}

	/**
	 * Obtem a hora limite final
	 *
	 * @return string
	 */
	public function getEndTime() {
		return $this->endTime;
	}

}
?>