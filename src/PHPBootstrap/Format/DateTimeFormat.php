<?php
namespace PHPBootstrap\Format;

/**
 * Formato data e hora
 */
class DateTimeFormat implements DateFormatter {

	/**
	 * Padr�o do formato
	 *
	 * @var string
	 */
	protected $pattern;

	/**
	 * Conversor
	 *
	 * @var DateParser
	 */
	protected $parser;

	/**
	 * Construtor
	 *
	 * @param string $pattern
	 * @param DateParser $parser
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $pattern, DateParser $parser = null ) {
		if ( preg_match('/^(' . $this->getRegexDatePattern() . ')\s' . $this->getRegexTimePattern() . '$/', $pattern) <= 0 ) {
			throw new \InvalidArgumentException('datetime format is invalid');
		}
		$this->pattern = $pattern;
		$this->parser = $parser;
	}

	/**
	 * Formata uma data a partir da representa��o em string, inteiro ou DateTime
	 *
	 * @param mixed $value
	 * @return string
	 * @throws \InvalidArgumentException
	 */
	public function format( $value ) {
		if ( $value === null || $value === '' ) {
			return null;
		}
		if ( is_string($value) ) {
			if ( ( $value = strtotime($value) ) === false ) {
				throw new \InvalidArgumentException('date is invalid');
			}
		}
		if ( $value instanceof \DateTime ) {
			$errors = $value->getLastErrors();
			if ( $errors['error_count'] <= 0 ){
				$value = $value->getTimestamp();
			}
		}
		if ( is_numeric($value) ) {
			return date($this->toDate(), $value);
		}
		throw new \InvalidArgumentException('date is invalid');
	}

	/**
	 * Converte para data/hora a partir da representa��o em string
	 *
	 * @param string $value
	 * @return string
	 * @throws \InvalidArgumentException
	 */
	public function parse( $value ) {
		if ( $value === null || $value === '' ) {
			return null;
		}
		if ( preg_match('/^' . $this->regex() . '$/', $value) <= 0 ) {
			throw new \InvalidArgumentException('value not is format: ' . $this->pattern);
		}
		$value = $this->formatter($this->toTimestamp($value));
		if ( isset($this->parser) ) {
			return $this->parser->parse($value);
		}
		return $value;
	}

	/**
	 *
	 * @see Formatter::regex()
	 */
	public function regex() {
		$pattern = $this->toDate();
		if ( preg_match('/^(d|m|Y)/', $pattern) ) {
			
			$day[1] = '(0[1-9]|1\d|2[0-8])';
			$month[1] = '(0[1-9]|1[0-2])';
			
			$day[2] = '(29|30)';
			$month[2] = '(0[469]|11)';
			
			$day[3] = '(29|3[01])';
			$month[3] = '(0[13578]|1[02])';
			
			$day[4] = '29';
			$month[4] = '02';
			
			$year = '(1[6-9]|[2-9]\d)\d{2}';
			$year29 = '(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26]))|((16|[2468][048]|[3579][26])00))';
			
			$split = preg_split('/\s/i', $pattern, 2);
			$date = array_shift($split);
			
			if ( preg_match('/(^Y|Y$)/', $date) > 0 ) {
				$dayMonth = preg_replace('/(^Y.|.Y)$/', '', $date);
				$partial = implode(')|(', array( str_replace(array( 'd', 'm' ), array( $day[1], $month[1] ), $dayMonth), str_replace(array( 'd', 'm' ), array( $day[2], $month[2] ), $dayMonth), str_replace(array( 'd', 'm' ), array( $day[3], $month[3] ), $dayMonth) ));
				$parse[$date] = '((' . str_replace(array( $dayMonth, 'Y' ), array( '((' . $partial . '))', $year ), $date) . ')|' . '(' . str_replace(array( 'd', 'm', 'Y' ), array( $day[4], $month[4], $year29 ), $date) . '))';
			} else {
				$parse[$date] = '(' . implode(')|(', array( str_replace(array( 'd', 'm', 'Y' ), array( $day[1], $month[1], $year ), $date), str_replace(array( 'd', 'm', 'Y' ), array( $day[2], $month[2], $year ), $date), str_replace(array( 'd', 'm', 'Y' ), array( $day[3], $month[3], $year ), $date), str_replace(array( 'd', 'm', 'Y' ), array( $day[4], $month[4], $year29 ), $date) )) . ')';
			}
		}
		$parse['H'] = '([01]\d|2[0-3])';
		$parse['h'] = '(0[1-9]|1[0-2])';
		$parse['i'] = '([0-5]\d)';
		$parse['s'] = '([0-5]\d)?';
		$parse['A'] = '([AP]M|[ap]m)';
		$parse[' '] = '\s';
		$parse['.'] = '\.';
		$parse['/'] = '\/';
		
		return str_replace(array_keys($parse), $parse, $pattern);
	}

	/**
	 *
	 * @see DateFormatter::pattern()
	 */
	public function pattern() {
		return $this->pattern;
	}

	/**
	 * Formata o timestamp para o formato correspondente
	 * 
	 * @param integer $timestamp
	 */
	protected function formatter( $timestamp ) {
		return date('Y-m-d H:i:s', $timestamp);
	}

	/**
	 * Converte a expressao em um timestamp
	 *
	 * @param string $value
	 * @return integer
	 */
	final protected function toTimestamp( $value ) {
		$date = date_parse_from_format($this->toDate(), $value);
		return mktime($date['hour'], $date['minute'], $date['second'], $date['month'], $date['day'], $date['year']);
	}

	/**
	 * Converte o padr�o do formato para a funcao date
	 *
	 * @return string
	 */
	final protected function toDate() {
		$parse['HH'] = 'H';
		$parse['hh'] = 'h';
		$parse[':mm'] = ':i';
		$parse[':ss'] = ':s';
		$parse['dd'] = 'd';
		$parse['mm'] = 'm';
		$parse['yyyy'] = 'Y';
		$meridian = preg_match('/hh/', $this->pattern) > 0 ? ' A' : '';
		return str_replace(array_keys($parse), $parse, $this->pattern) . $meridian;
	}

	/**
	 * Obtem a express�o regular para o padr�o de data
	 *
	 * @return string
	 */
	final protected function getRegexDatePattern() {
		$regex[] = 'dd[-\/\.]mm[-\/\.]yyyy';
		$regex[] = 'dd[-\/\.]yyyy[-\/\.]mm';
		$regex[] = 'mm[-\/\.]dd[-\/\.]yyyy';
		$regex[] = 'mm[-\/\.]yyyy[-\/\.]dd';
		$regex[] = 'yyyy[-\/\.]mm[-\/\.]dd';
		$regex[] = 'yyyy[-\/\.]dd[-\/\.]mm';
		
		return implode('|', $regex);
	}

	/**
	 * Obtem a express�o regular para o padr�o de hora
	 *
	 * @return string
	 */
	final protected function getRegexTimePattern() {
		return '(HH|hh):mm(:ss)?';
	}

}
?>