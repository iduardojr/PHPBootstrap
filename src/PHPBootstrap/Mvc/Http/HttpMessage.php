<?php
namespace PHPBootstrap\Mvc\Http;

use PHPBootstrap\Common\Enum;

/**
 * Messagem http
 */
abstract class HttpMessage {
	
	//Versão
	const Http10 = '1.0';
	const Http11 = '1.1';
	
	/**
	 * Versão do http
	 *
	 * @var string
	 */
	protected $version;
	
	/**
	 * Cabeçalhos
	 *
	 * @var array
	 */
	protected $headers = array();
	
	/**
	 * Obtem a versão do http
	 *
	 * @return string
	 */
	public function getVersion() {
		return $this->version;
	}
	
	/**
	 * Atribui a versão do http
	 * - HttpMessage.Http10
	 * - HttpMessage.Http11
	 * 
	 * @param string $version
	 * @throws \UnexpectedValueException
	 */
	public function setVersion( $version ) {
		$enum[] = HttpMessage::Http10;
		$enum[] = HttpMessage::Http11;
		$this->version = Enum::ensure($version, $enum, self::Http11);
	}
	
	/**
	 * Obtem a lista de cabecalhos
	 *
	 * @return array
	 */
	public function getHeaders() {
		$headers = $this->headers;
		if ( isset($headers['Set-Cookie']) ) {
			$headers['Set-Cookie'] = 'Set-Cookie: ' . implode("\r", $headers['Set-Cookie']);
		}
		return $headers;
	}
	
	/**
	 * Atribui um cabeçalho
	 *
	 * @param string $header
	 * @param string $value
	 * @throws \InvalidArgumentException
	 */
	public function setHeader( $header, $value = null ) {
		if ( func_num_args() == 1 ) {
			$header = explode(':', $header);
			if ( count($header) == 2 ) {
				$value = $header[2];
				$header = $header[1];
			} else {
				throw new \InvalidArgumentException('header invalid');
			}
		}
		$header = $this->formatFieldHeader($header);
		if ( empty($value) ) {
			unset($this->headers[$header]);
		} else {
			$this->headers[$header] = $header === 'Set-Cookie' ? Cookie::fromString($value) : $header . ': ' . trim($value);
		}
	}
	
	/**
	 * Obtem um cabecalho
	 *
	 * @param string $name
	 * @return string
	 */
	public function getHeader( $name ) {
		$headers = $this->getHeaders();
		$name = $this->formatFieldHeader($name);
		if ( isset($headers[$name]) ) {
			$value = explode(': ', $headers[$name]);
			return count($value) > 1 ? $value[1] : $value[0];
		}
	}
	
	/**
	 * Formata o nome do campo do header
	 *
	 * @param string $fieldName
	 * @return string
	 */
	private function formatFieldHeader( $fieldName ) {
		$fieldName = trim($fieldName);
		$fieldName = str_replace('-', ' ', $fieldName);
		$fieldName = strtolower($fieldName);
		$fieldName = ucwords($fieldName);
		return str_replace(' ', '-', $fieldName);
	}
}
?>