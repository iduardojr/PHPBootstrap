<?php
namespace PHPBootstrap\Format;

/**
 * Formato de hora
 */
class TimeFormat extends DateTimeFormat {

	/**
	 * Construtor
	 *
	 * @param string $pattern
	 * @param DateParser $parser
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $pattern, DateParser $parser = null  ) {
		if ( preg_match('/^(' . $this->getRegexTimePattern() . ')$/', $pattern) <= 0 ) {
			throw new \InvalidArgumentException('time format is invalid');
		}
		$this->pattern = $pattern;
		$this->parser = $parser;
	}
	
	/**
	 *
	 * @see DateTimeFormat::formatter()
	 */
	protected function formatter( $timestamp ) {
		return date('H:i:s', $timestamp);
	}

}
?>