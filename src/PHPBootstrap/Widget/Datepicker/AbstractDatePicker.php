<?php
namespace PHPBootstrap\Widget\Datepicker;

use PHPBootstrap\Format\DateFormat;
use PHPBootstrap\Widget\AbstractRender;

/**
 * Seletor de data abstrato
 */
class AbstractDatePicker extends AbstractRender {

	/**
	 * Formato
	 *
	 * @var DateFormat
	 */
	protected $format;

	/**
	 * Dia inicial da semana
	 *
	 * @var interger
	 */
	protected $weekStart;

	/**
	 * Exibir o numero da semana
	 *
	 * @var boolean
	 */
	protected $calendarWeeks;

	/**
	 * Dias da semana desabilitados
	 *
	 * @var array
	 */
	protected $daysOfWeekDisabled;

	/**
	 * Data inicial
	 *
	 * @var DateTime
	 */
	protected $startDate;

	/**
	 * Data final
	 *
	 * @var DateTime
	 */
	protected $endDate;

	/**
	 * Data atual destacada
	 *
	 * @var boolean
	 */
	protected $todayHighlight;

	/**
	 * Exibir botão de hoje
	 *
	 * @var boolean
	 */
	protected $todayButton;

	/**
	 * Fechar quanto data for selecionado
	 *
	 * @var boolean
	 */
	protected $autoclose;

	/**
	 * Construtor
	 *
	 * @param DateFormat $format
	 */
	public function __construct( DateFormat $format ) {
		$this->setWeekStart(0);
		$this->setFormat($format);
		$this->setAutoclose(true);
		$this->setTodayButton(true);
		$this->setTodayHighlight(true);
		$this->setCalendarWeeks(false);
		$this->setDaysOfWeekDisabled(null);
	}

	/**
	 * Obtem formato
	 *
	 * @return DateFormat
	 */
	public function getFormat() {
		return $this->format;
	}

	/**
	 * Atribui formato
	 *
	 * @param DateFormat $format
	 */
	public function setFormat( DateFormat $format ) {
		$this->format = $format;
	}

	/**
	 * Obtem o inicio da semana
	 *
	 * @return integer
	 */
	public function getWeekStart() {
		return $this->weekStart;
	}

	/**
	 * Atribui o inicio da semana
	 *
	 * @param integer $weekStart
	 */
	public function setWeekStart( $weekStart ) {
		$this->weekStart = ( int ) ( $weekStart >= 0 && $weekStart <= 6 ? $weekStart : 0 );
	}

	/**
	 * Obtem exibir o numero da semana
	 *
	 * @return boolean
	 */
	public function getCalendarWeeks() {
		return $this->calendarWeeks;
	}

	/**
	 * Atribui exibir o numero da semana
	 *
	 * @param boolean $calendarWeeks
	 */
	public function setCalendarWeeks( $calendarWeeks ) {
		$this->calendarWeeks = ( bool ) $calendarWeeks;
	}

	/**
	 * Obtem os dias da semana desabilitados
	 *
	 * @return array
	 */
	public function getDaysOfWeekDisabled() {
		return $this->daysOfWeekDisabled;
	}

	/**
	 * Atribui os dias da semana desabilitados
	 *
	 * @param integer|null $day
	 * @param ...
	 * @throws \InvalidArgumentException
	 */
	public function setDaysOfWeekDisabled( $day ) {
		if ( $day === null ) {
			$daysOfWeek = array();
		} else {
			$daysOfWeek = func_get_args();
		}
		foreach ( $daysOfWeek as $key => $day ) {
			if ( $day < 0 && $day > 6 ) {
				throw new \InvalidArgumentException('argument[' . $key . '] not is day of week valid');
			}
			$daysOfWeek[$key] = ( int ) $day;
		}
		$this->daysOfWeekDisabled = $daysOfWeek;
	}

	/**
	 * Obtem data limite inicial
	 *
	 * @return string
	 */
	public function getStartDate() {
		return $this->startDate;
	}

	/**
	 * Atribui data limite inicial
	 *
	 * @param mixed $startDate
	 * @throws \InvalidArgumentException
	 */
	public function setStartDate( $startDate ) {
		if ( preg_match($this->format->regex(), $startDate) <= 0 ) {
			$startDate = $this->format->format($startDate);
		}
		$this->startDate = $startDate;
	}

	/**
	 * Obtem a data limite final
	 *
	 * @return string
	 */
	public function getEndDate() {
		return $this->endDate;
	}

	/**
	 * Atribui a data limite final
	 *
	 * @param mixed $endDate
	 * @throws \InvalidArgumentException
	 */
	public function setEndDate( $endDate ) {
		if ( preg_match($this->format->regex(), $endDate) <= 0 ) {
			$endDate = $this->format->format($endDate);
		}
		$this->endDate = $endDate;
	}

	/**
	 * Atribui o intervalo limite de datas
	 * 
	 * @param mixed $startDate
	 * @param mixed $endDate
	 * @throws \InvalidArgumentException
	 */
	public function setBetweenDate( $startDate, $endDate ) {
		$this->setStartDate($startDate);
		$this->setEndDate($endDate);
	}

	/**
	 * Obtem data atual destacada
	 *
	 * @return boolean
	 */
	public function getTodayHighlight() {
		return $this->todayHighlight;
	}

	/**
	 * Atribui a data atual destacada
	 *
	 * @param boolean $todayHighlight
	 */
	public function setTodayHighlight( $todayHighlight ) {
		$this->todayHighlight = ( bool ) $todayHighlight;
	}

	/**
	 * Obtem exibir botao hoje
	 *
	 * @return boolean
	 */
	public function getTodayButton() {
		return $this->todayButton;
	}

	/**
	 * Atribui exibir botao hoje
	 *
	 * @param boolean $todayBtn
	 */
	public function setTodayButton( $todayBtn ) {
		$this->todayButton = ( bool ) $todayBtn;
	}

	/**
	 * Obtem fechamento automatico
	 *
	 * @return boolean
	 */
	public function getAutoclose() {
		return $this->autoclose;
	}

	/**
	 * Atribui fechamento automatico
	 *
	 * @param boolean $autoclose
	 */
	public function setAutoclose( $autoclose ) {
		$this->autoclose = ( bool ) $autoclose;
	}

}
?>