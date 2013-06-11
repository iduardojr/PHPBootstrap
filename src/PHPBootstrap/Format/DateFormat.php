<?php
namespace PHPBootstrap\Format;

/**
 * Formato de data
 */
class DateFormat extends DateTimeFormat {

	/**
	 * Construtor
	 *
	 * @param string $pattern
	 * @param DateParser $parser
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $pattern, DateParser $parser = null ) {
		if ( preg_match('/^(' . $this->getRegexDatePattern() . ')$/', $pattern) <= 0 ) {
			throw new \InvalidArgumentException('date format is invalid');
		}
		$this->pattern = $pattern;
		$this->parser = $parser;
	}

	/**
	 *
	 * @see DateTimeFormat::formatter()
	 */
	protected function formatter( $timestamp ) {
		return date('Y-m-d', $timestamp);
	}

}
?>